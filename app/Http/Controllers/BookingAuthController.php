<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class BookingAuthController extends Controller
{
    public function processUser(Request $request)
    {
        // 1. Validate the request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'is_creating_account' => 'sometimes|boolean',
            'password' => 'required_if:is_creating_account,true|nullable|min:8',
        ]);

        // 2. Standardize the phone number
        $cleanPhone = preg_replace('/[^0-9+]/', '', $request->phone_number);
        $isCreatingAccount = $request->boolean('is_creating_account');

        // 3. Check for existing registered user
        $existingUser = User::where('phone_number', $cleanPhone)->first();

        if ($existingUser && !$existingUser->is_guest && !$isCreatingAccount) {
            throw ValidationException::withMessages([
                'phone_number' => 'An account with this phone number already exists. Please log in to complete your booking.',
            ]);
        }

        // 4. Hash password if applicable
        $hashedPassword = $isCreatingAccount ? Hash::make($request->password) : null;

        // 5. Create or Update User
        $user = User::updateOrCreate(
            ['phone_number' => $cleanPhone],
            [
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'is_guest'   => !$isCreatingAccount,
                'password'   => $hashedPassword ?? ($existingUser->password ?? null),
            ]
        );

        // 6. Log them in if they created an account
        if ($isCreatingAccount) {
            Auth::login($user);
        }

        // ==========================================
        // CHANGED: Redirect back to the form with a success message
        // ==========================================
        return redirect()->back()->with('success', 'Your details have been saved and your booking is confirmed!');
    }


    public function login(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
            'password' => 'required|string',
        ]);

        $cleanPhone = preg_replace('/[^0-9+]/', '', $request->phone_number);

        if (Auth::attempt(['phone_number' => $cleanPhone, 'password' => $request->password])) {
            $request->session()->regenerate();
            
            // ==========================================
            // CHANGED: Redirect to the homepage after successful login
            // (Using 'intended' will send them back to where they were trying to go before logging in, or default to '/')
            // ==========================================
            return redirect()->intended('/')->with('success', 'You are now logged in!');
        }

        throw ValidationException::withMessages([
            'phone_number' => 'The provided credentials do not match our records.',
        ]);
    }
    
    public function register(Request $request)
    {
        // 1. Validate the incoming data
        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'password'     => 'required|string|min:8|confirmed', // 'confirmed' expects a password_confirmation field
        ]);

        // 2. Standardize the phone number
        $cleanPhone = preg_replace('/[^0-9+]/', '', $request->phone_number);

        // 3. Check if a registered account already exists
        $existingUser = User::where('phone_number', $cleanPhone)->first();

        if ($existingUser && !$existingUser->is_guest) {
            throw ValidationException::withMessages([
                'phone_number' => 'An account with this phone number already exists. Please log in.',
            ]);
        }

        // 4. Create new user OR upgrade an existing guest record
        $user = User::updateOrCreate(
            ['phone_number' => $cleanPhone],
            [
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'is_guest'   => false, // Explicitly false since they are registering
                'password'   => Hash::make($request->password),
            ]
        );

        // 5. Log the user in
        Auth::login($user);

        // 6. Redirect to homepage with success message
        return redirect()->route('homepage')->with('success', 'Account created successfully!');
    }
}