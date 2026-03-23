<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerBookingController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('booking', compact('services'));
    }

    public function store(Request $request)
    {
        // 1. Base Validation (Services & Date)
        $rules = [
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
            'appointment_date' => 'required|date|after_or_equal:today',
        ];

        // 2. If Guest, add validation for their details
        if (!Auth::check()) {
            $rules = array_merge($rules, [
                'first_name' => 'required|string|max:255',
                'last_name'  => 'required|string|max:255',
                'phone_number' => 'required|string|max:20',
                'is_creating_account' => 'sometimes|boolean',
                'password' => 'required_if:is_creating_account,1|nullable|min:8',
            ]);
        }

        $request->validate($rules);

        // 3. Determine the User (Get logged in user OR create the guest)
        $user = Auth::user();

        if (!$user) {
            $cleanPhone = preg_replace('/[^0-9+]/', '', $request->phone_number);
            $isCreatingAccount = $request->boolean('is_creating_account');

            // Prevent overwriting a registered user with a guest booking
            $existingUser = \App\Models\User::where('phone_number', $cleanPhone)->first();
            if ($existingUser && !$existingUser->is_guest && !$isCreatingAccount) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'phone_number' => 'An account with this phone number already exists. Please log in to book.',
                ]);
            }

            // Create Guest or New Account
            $user = \App\Models\User::updateOrCreate(
                ['phone_number' => $cleanPhone],
                [
                    'first_name' => $request->first_name,
                    'last_name'  => $request->last_name,
                    'is_guest'   => !$isCreatingAccount,
                    'password'   => $isCreatingAccount ? \Illuminate\Support\Facades\Hash::make($request->password) : ($existingUser->password ?? null),
                ]
            );

            // Log them in if they chose to create an account during checkout
            if ($isCreatingAccount) {
                Auth::login($user);
            }
        }

        // 4. Calculate total price and create the booking
        $selectedServices = Service::whereIn('id', $request->services)->get();
        $totalPrice = $selectedServices->sum('price');

        $booking = Booking::create([
            'user_id' => $user->id,
            'appointment_date' => $request->appointment_date,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        $booking->services()->attach($request->services);

        return redirect()->route('homepage')->with('success', 'Your sanctuary appointment has been successfully booked!');
    }
}