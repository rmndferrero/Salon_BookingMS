<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ManagerBookingController extends Controller
{
    // 1. Load the Dashboard with Data
    public function dashboard()
    {
        // Fetch all requests waiting for approval
        $pendingBookings = Booking::with(['user', 'services'])
            ->where('status', 'pending')
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->get();
            
        // Fetch confirmed upcoming appointments
        $confirmedBookings = Booking::with(['user', 'services'])
            ->where('status', 'confirmed')
            ->where('appointment_date', '>=', now()->toDateString())
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->get();

        // Calculate Stats for the top cards
        $todayBookingsCount = Booking::where('status', 'confirmed')
            ->where('appointment_date', now()->toDateString())
            ->count();
            
        $pendingCount = $pendingBookings->count();

        return view('manager.dashboard', compact('pendingBookings', 'confirmedBookings', 'todayBookingsCount', 'pendingCount'));
    }

    // 2. Confirm a Booking
    public function confirm(Booking $booking)
    {
        $booking->update(['status' => 'confirmed']);
        return redirect()->back()->with('success', 'Booking confirmed! The customer slot is officially secured.');
    }

    // 3. Decline a Booking
    public function decline(Booking $booking)
    {
        // Changing it to 'declined' instantly removes it from the Javascript Calendar API
        $booking->update(['status' => 'declined']);
        return redirect()->back()->with('success', 'Booking declined. The calendar time slot is now free.');
    }
}
