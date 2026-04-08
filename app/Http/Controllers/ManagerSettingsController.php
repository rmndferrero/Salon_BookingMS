<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlackoutDate;
use App\Models\Booking;

class ManagerSettingsController extends Controller
{
    // 1. Load the Settings Page
    public function index()
    {
        // Get all future blackout dates
        $blackoutDates = BlackoutDate::where('end_date', '>=', now()->toDateString())
            ->orderBy('start_date')
            ->get();

        return view('manager.settings', compact('blackoutDates'));
    }

    // 2. AJAX Preview: Returns all bookings that WILL be cancelled
    // 2. AJAX Preview: Returns all bookings that WILL be cancelled
    public function previewBlackout(Request $request)
    {
        $request->validate([
            // Must be tomorrow or later! Cannot close today.
            'start_date' => 'required|date|after:today', 
            // Must be strictly after start_date (e.g., Start 9th, End 10th)
            'end_date' => 'required|date|after:start_date', 
        ]);

        $affectedBookings = Booking::with('user', 'services')
            ->where('appointment_date', '>=', $request->start_date)
            ->where('appointment_date', '<', $request->end_date) // EXCLUSIVE: Stops before end_date
            ->whereIn('status', ['pending', 'confirmed'])
            ->get();

        return response()->json($affectedBookings);
    }

    // 3. Confirm and Execute the Blackout
    public function storeBlackout(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            'reason' => 'nullable|string|max:255'
        ]);

        BlackoutDate::create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
        ]);

        // Mass-cancel the affected bookings using the new exclusive logic!
        $affectedCount = Booking::where('appointment_date', '>=', $request->start_date)
            ->where('appointment_date', '<', $request->end_date)
            ->whereIn('status', ['pending', 'confirmed'])
            ->update(['status' => 'cancelled']);

        return redirect()->back()->with('success', "Operations closed. $affectedCount appointments were automatically cancelled.");
    }

    // 4. Reopen a mistakenly closed date
    public function destroyBlackout(BlackoutDate $blackoutDate)
    {
        $blackoutDate->delete();
        // As per Option A, we DO NOT restore cancelled bookings. They remain cancelled.
        return redirect()->back()->with('success', 'Date reopened for booking. Note: Previously cancelled appointments must rebook manually.');
    }
}