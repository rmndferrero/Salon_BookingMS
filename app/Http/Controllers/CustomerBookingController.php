<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomerBookingController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('booking', compact('services'));
    }

    // 1. The API endpoint for the Javascript Calendar
    public function getAvailability(Request $request)
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');
        $serviceIds = $request->query('services', []); 

        if (!$startDate || !$endDate || empty($serviceIds)) {
            return response()->json([]); 
        }

        $results = [];
        $currentDate = Carbon::parse($startDate);
        $finalDate = Carbon::parse($endDate);

        // Loop through all 7 days and run the Math Engine for each
        while ($currentDate <= $finalDate) {
            $dateString = $currentDate->format('Y-m-d');
            // We call the private Math Engine we built earlier!
            $results[$dateString] = $this->calculateAvailability($dateString, $serviceIds);
            $currentDate->addDay();
        }

        // Returns an array like: {"2026-04-08": ["10:00", "10:30"], "2026-04-09": ["14:00"]}
        return response()->json($results); 
    }

    // 2. THE MATH ENGINE (Now extracted so the Vault Door can use it safely)
    private function calculateAvailability($date, $serviceIds)
    {
        $allServices = Service::whereIn('id', $serviceIds)->get()->keyBy('id');
        $services = collect($serviceIds)->map(function($id) use ($allServices) {
            return $allServices[$id] ?? null;
        })->filter(); 

        $dayOfWeek = Carbon::parse($date)->dayOfWeek;
        $openTime = Carbon::parse($date . ' 10:00:00');
        $closeTime = Carbon::parse($date . (in_array($dayOfWeek, [0, 5, 6]) ? ' 22:00:00' : ' 21:00:00'));

        // --- CHECK FOR BLACKOUT DATES ---
        $isBlackout = \App\Models\BlackoutDate::where('start_date', '<=', $date)
            ->where('end_date', '>', $date) // FIXED: Now uses '>' instead of '>='
            ->exists();
            
        if ($isBlackout) {
            return []; // Instantly return an empty array!
        }

        $employees = \App\Models\Employee::where('is_active', true)->get();
        $categoryCapacity = [];
        foreach ($employees as $emp) {
            if (is_array($emp->can_do)) {
                foreach ($emp->can_do as $cat) {
                    $categoryCapacity[$cat] = ($categoryCapacity[$cat] ?? 0) + 1;
                }
            }
        }

        $bookings = Booking::where('appointment_date', $date)
            ->whereIn('status', ['pending', 'confirmed'])
            ->get();

        // FIX: Bypass Laravel's eager loading collapse by fetching the raw pivot records!
        // This guarantees that if a cart has 3 Haircuts, the math engine simulates 3 Haircuts.
        $pivotRecords = DB::table('booking_service')
            ->join('services', 'services.id', '=', 'booking_service.service_id')
            ->whereIn('booking_service.booking_id', $bookings->pluck('id'))
            ->select('booking_service.booking_id', 'services.category', 'services.duration_minutes')
            ->get()
            ->groupBy('booking_id');

        $availableSlots = [];
        $currentTime = $openTime->copy();

        while ($currentTime < $closeTime) {
            $candidateStartTime = $currentTime->copy();
            $isValid = true;
            $virtualClock = $candidateStartTime->copy();

            foreach ($services as $service) {
                $serviceStart = $virtualClock->copy();
                $serviceEnd = $virtualClock->copy()->addMinutes($service->duration_minutes);

                if ($serviceEnd > $closeTime) {
                    $isValid = false; break; 
                }

                $cat = $service->category;
                $maxCapacity = $categoryCapacity[$cat] ?? 0;

                if ($maxCapacity == 0) {
                    $isValid = false; break; 
                }

                $busyCount = 0;
                foreach ($bookings as $b) {
                    $bClock = Carbon::parse($b->appointment_date . ' ' . $b->start_time);
                    $bServices = $pivotRecords->get($b->id, []); // Pull the exact un-collapsed sequence
                    
                    foreach ($bServices as $bService) {
                        $bServiceStart = $bClock->copy();
                        $bServiceEnd = $bClock->copy()->addMinutes($bService->duration_minutes);

                        if ($bService->category === $cat) {
                            if ($bServiceStart < $serviceEnd && $bServiceEnd > $serviceStart) {
                                $busyCount++;
                            }
                        }
                        $bClock = $bServiceEnd; 
                    }
                }

                if ($busyCount >= $maxCapacity) {
                    $isValid = false; break; 
                }

                $virtualClock = $serviceEnd; 
            }

            if ($isValid) {
                $availableSlots[] = $candidateStartTime->format('H:i'); 
            }

            $currentTime->addMinutes(30); 
        }

        return $availableSlots;
    }

    public function store(Request $request)
    {
        $rules = [
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
            'appointment_date' => 'required|date',
            'start_time' => 'required|date_format:H:i', 
        ];

        if (!Auth::check()) {
            $rules = array_merge($rules, [
                'first_name' => 'required|string|max:255',
                'last_name'  => 'required|string|max:255',
                'phone_number' => 'required|string|max:20',
            ]);
        }

        $request->validate($rules);

        // --- THE VAULT DOOR FIX ---
        // Safely ask the internal math engine directly instead of mocking an HTTP Request
        $availableSlots = $this->calculateAvailability($request->appointment_date, $request->services);
        $requestedTimeFormatted = Carbon::parse($request->start_time)->format('H:i');
        
        if (!in_array($requestedTimeFormatted, $availableSlots)) {
            return redirect()->back()->with('error', 'Sorry, this time slot is no longer available. Please select another time.');
        }

        // ... Create User ...
        $user = Auth::user();
        if (!$user) {
            $cleanPhone = preg_replace('/[^0-9+]/', '', $request->phone_number);
            $user = \App\Models\User::firstOrCreate(
                ['phone_number' => $cleanPhone],
                [
                    'first_name' => $request->first_name,
                    'last_name'  => $request->last_name,
                    'is_guest'   => true,
                ]
            );
        }

        $selectedServices = collect($request->services)->map(function($id) {
            return Service::find($id);
        });
        
        $totalPrice = $selectedServices->sum('price');
        $totalDuration = $selectedServices->sum('duration_minutes'); 
        $startTime = Carbon::parse($request->appointment_date . ' ' . $request->start_time);
        $endTime = $startTime->copy()->addMinutes($totalDuration);

        $booking = Booking::create([
            'user_id' => $user->id,
            'appointment_date' => $request->appointment_date,
            'start_time' => $startTime->format('H:i:s'), 
            'end_time' => $endTime->format('H:i:s'),     
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        $booking->services()->attach($request->services);

        return redirect()->route('homepage')->with('success', 'Your sanctuary appointment has been successfully booked!');
    }
}