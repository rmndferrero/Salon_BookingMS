<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CustomerBookingController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('booking', compact('services'));
    }

    public function getAvailability(Request $request)
    {
        $date = $request->query('date');
        $serviceIds = $request->query('services', []); 

        if (!$date || empty($serviceIds)) {
            return response()->json([]); 
        }

        // --- BUG FIX: Preserving duplicate services ---
        // If a cart has two Haircuts (ID 1, ID 1), we must simulate BOTH!
        $allServices = \App\Models\Service::whereIn('id', $serviceIds)->get()->keyBy('id');
        $services = collect($serviceIds)->map(function($id) use ($allServices) {
            return $allServices[$id] ?? null;
        })->filter(); // Remove any nulls just in case

        $dayOfWeek = Carbon::parse($date)->dayOfWeek;
        $openTime = Carbon::parse($date . ' 10:00:00');
        $closeTime = Carbon::parse($date . (in_array($dayOfWeek, [0, 5, 6]) ? ' 22:00:00' : ' 21:00:00'));

        $employees = \App\Models\Employee::where('is_active', true)->get();
        $categoryCapacity = [];
        foreach ($employees as $emp) {
            if (is_array($emp->can_do)) {
                foreach ($emp->can_do as $cat) {
                    $categoryCapacity[$cat] = ($categoryCapacity[$cat] ?? 0) + 1;
                }
            }
        }

        $bookings = \App\Models\Booking::with('services')
            ->where('appointment_date', $date)
            ->whereIn('status', ['pending', 'confirmed'])
            ->get();

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
                    
                    foreach ($b->services as $bService) {
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

        return response()->json($availableSlots);
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

        // --- THE VAULT DOOR: Double check capacity before saving! ---
        $checkReq = new Request([
            'date' => $request->appointment_date,
            'services' => $request->services
        ]);
        
        $availableSlotsResponse = $this->getAvailability($checkReq);
        $availableSlots = json_decode($availableSlotsResponse->getContent());
        $requestedTimeFormatted = Carbon::parse($request->start_time)->format('H:i');
        
        if (!in_array($requestedTimeFormatted, $availableSlots)) {
            // Reject the booking if the time slot was stolen or is over capacity!
            return redirect()->back()->with('error', 'Sorry, this time slot was just taken! Please select another time.');
        }
        // -------------------------------------------------------------

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