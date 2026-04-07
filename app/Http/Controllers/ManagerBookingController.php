<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class ManagerBookingController extends Controller
{
    // 1. Load the Dashboard with Data
    public function dashboard()
    {
        $pendingBookings = Booking::with(['user', 'services'])
            ->where('status', 'pending')
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->get();
            
        $confirmedBookings = Booking::with(['user', 'services'])
            ->where('status', 'confirmed')
            ->where('appointment_date', '>=', now()->toDateString())
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->get();

        $todayBookingsCount = Booking::where('status', 'confirmed')
            ->where('appointment_date', now()->toDateString())
            ->count();
            
        $pendingCount = $pendingBookings->count();

        // NEW: Fetch all active employees to pass to the view
        $employees = Employee::where('is_active', true)->get();

        return view('manager.dashboard', compact('pendingBookings', 'confirmedBookings', 'todayBookingsCount', 'pendingCount', 'employees'));
    }

    // 2. Confirm a Booking
    public function confirm(Request $request, Booking $booking)
    {
        // Require the manager to assign an employee to every service
        $request->validate([
            'assignments' => 'required|array',
            'assignments.*' => 'required|exists:employees,id',
        ]);

        // Start calculating the sequential timeline (Option A)
        $currentStartTime = Carbon::parse($booking->appointment_date . ' ' . $booking->start_time);

        foreach ($booking->services as $service) {
            $employeeId = $request->assignments[$service->id];
            
            $serviceDuration = $service->duration_minutes;
            $serviceEndTime = $currentStartTime->copy()->addMinutes($serviceDuration);

            // Update the Pivot Table with the exact assignment and time
            DB::table('booking_service')
                ->where('booking_id', $booking->id)
                ->where('service_id', $service->id)
                ->update([
                    'employee_id' => $employeeId,
                    'service_start_time' => $currentStartTime->format('H:i:s'),
                    'service_end_time' => $serviceEndTime->format('H:i:s'),
                ]);

            // Move the start clock forward for the next service in the loop!
            $currentStartTime = $serviceEndTime; 
        }

        $booking->update(['status' => 'confirmed']);

        return redirect()->back()->with('success', 'Booking confirmed and employees securely assigned!');
    }

    // 3. Decline a Booking
    public function decline(Booking $booking)
    {
        // Changing it to 'declined' instantly removes it from the Javascript Calendar API
        $booking->update(['status' => 'declined']);
        return redirect()->back()->with('success', 'Booking declined. The calendar time slot is now free.');
    }
}
