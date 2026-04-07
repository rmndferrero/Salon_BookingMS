<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // Don't forget this import for time math!

class CustomerBookingController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('booking', compact('services'));
    }

    // --- THE MISSING CALENDAR API ENDPOINT ---
    public function getAvailability(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Fetch all bookings within this week that are NOT cancelled
        $bookings = Booking::whereBetween('appointment_date', [$request->start_date, $request->end_date])
            ->whereIn('status', ['pending', 'confirmed'])
            ->get(['appointment_date', 'start_time', 'end_time']);

        return response()->json($bookings);
    }

    // --- THE UPGRADED STORE METHOD ---
    public function store(Request $request)
    {
        // 1. Base Validation
        $rules = [
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
            'appointment_date' => 'required|date',
            'start_time' => 'required|date_format:H:i', // Catch the time from JS!
        ];

        // 2. Validate Guests
        if (!Auth::check()) {
            $rules = array_merge($rules, [
                'first_name' => 'required|string|max:255',
                'last_name'  => 'required|string|max:255',
                'phone_number' => 'required|string|max:20',
            ]);
        }

        $request->validate($rules);

        // 3. Setup User / Guest
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

        // 4. Calculate Time & Price Math
        $selectedServices = Service::whereIn('id', $request->services)->get();
        $totalPrice = $selectedServices->sum('price');
        $totalDuration = $selectedServices->sum('duration_minutes'); 

        // Magic: Calculate the exact end time!
        $startTime = Carbon::parse($request->appointment_date . ' ' . $request->start_time);
        $endTime = $startTime->copy()->addMinutes($totalDuration);

        // 5. Save the Booking
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