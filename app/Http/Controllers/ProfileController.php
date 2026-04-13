<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class ProfileController extends Controller
{
    // 1. Display the Bookings Page
    public function bookings()
    {
        $user = Auth::user();

        // Fetch Future/Active Bookings
        $upcomingBookings = Booking::with('services')
            ->where('user_id', $user->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->get();

        // Fetch History (Completed, Cancelled, or Declined)
        $pastBookings = Booking::with('services')
            ->where('user_id', $user->id)
            ->whereIn('status', ['completed', 'declined', 'cancelled'])
            ->orderBy('appointment_date', 'desc')
            ->orderBy('start_time', 'desc')
            ->get();

        return view('profile.bookings', compact('upcomingBookings', 'pastBookings'));
    }

    // 2. Allow Customer to Self-Cancel
    public function cancelBooking(Booking $booking)
    {
        // Security check: Ensure they are only cancelling THEIR OWN booking!
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $booking->update(['status' => 'cancelled']);
        
        return redirect()->back()->with('success', 'Your appointment has been successfully cancelled. The time slot has been released.');
    }

    // 3. Display the Personal Info Page
    public function info()
    {
        return view('profile.info');
    }

    // 4. Handle the Form Submission
    public function updateInfo(Request $request)
    {
        $user = Auth::user();

        // Validate the incoming data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            // Ensure the new email is unique, UNLESS it belongs to the current user
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            // Password is optional, but if provided, it must be at least 8 chars and confirmed
            'password' => 'nullable|min:8|confirmed',
        ]);

        // Update the basic fields
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;

        // Only update the password if the user actually typed a new one
        if ($request->filled('password')) {
            $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Your personal information has been updated successfully.');
    }
}