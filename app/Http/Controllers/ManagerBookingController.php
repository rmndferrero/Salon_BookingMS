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
        // The Sweeper: Auto-complete past confirmed bookings
        Booking::where('status', 'confirmed')
            ->where('appointment_date', '<', now()->toDateString())
            ->update(['status' => 'completed']);

        $pendingBookings = Booking::with(['user', 'services'])
            ->where('status', 'pending')
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->get();
            
        // Dashboard snapshot (Today + Tomorrow + Day After)
        $confirmedBookings = Booking::with(['user', 'services'])
            ->where('status', 'confirmed')
            ->whereBetween('appointment_date', [now()->toDateString(), now()->addDays(2)->toDateString()])
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->get();

        // NEW: Fetch ALL upcoming confirmed bookings for the modal
        $allUpcomingBookings = Booking::with(['user', 'services'])
            ->where('status', 'confirmed')
            ->where('appointment_date', '>=', now()->toDateString())
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->get();

        $allDeclinedBookings = Booking::with(['user', 'services'])
            ->where('status', 'declined')
            ->orderBy('updated_at', 'desc')
            ->get();
            
        $recentDeclinedBookings = $allDeclinedBookings->take(5);

        $todayBookingsCount = Booking::where('status', 'confirmed')
            ->where('appointment_date', now()->toDateString())
            ->count();
            
        $pendingCount = $pendingBookings->count();

        $employees = \App\Models\Employee::all(); 

        // Don't forget to add $allUpcomingBookings to the compact() array!
        return view('manager.dashboard', compact(
            'pendingBookings', 'confirmedBookings', 'allUpcomingBookings', 'todayBookingsCount', 
            'pendingCount', 'employees', 'recentDeclinedBookings', 'allDeclinedBookings'
        ));
    }

    // 2. Confirm a Booking
    public function confirm(Request $request, Booking $booking)
    {
        $request->validate([
            'assignments' => 'required|array',
            'assignments.*' => 'required|exists:employees,id',
        ]);

        $currentStartTime = Carbon::parse($booking->appointment_date . ' ' . $booking->start_time);
        
        // --- PASS 1: DRY RUN CONFLICT CHECK ---
        $timeline = [];
        foreach ($booking->services as $service) {
            $employeeId = $request->assignments[$service->id];
            $serviceDuration = $service->duration_minutes;
            $serviceEndTime = $currentStartTime->copy()->addMinutes($serviceDuration);

            // Fetch this specific employee's confirmed shifts for today
            $empBookings = DB::table('booking_service')
                ->join('bookings', 'bookings.id', '=', 'booking_service.booking_id')
                ->where('booking_service.employee_id', $employeeId)
                ->where('bookings.appointment_date', $booking->appointment_date)
                ->where('bookings.status', 'confirmed') 
                ->where('bookings.id', '!=', $booking->id) 
                ->select('booking_service.service_start_time', 'booking_service.service_end_time')
                ->get();

            // Safely do the time math using Carbon instead of SQL!
            $overlap = false;
            foreach ($empBookings as $eb) {
                // FIX: We must combine the appointment date with the pivot time!
                $existingStart = Carbon::parse($booking->appointment_date . ' ' . $eb->service_start_time);
                $existingEnd = Carbon::parse($booking->appointment_date . ' ' . $eb->service_end_time);
                
                if ($currentStartTime < $existingEnd && $serviceEndTime > $existingStart) {
                    $overlap = true;
                    break;
                }
            }

            if ($overlap) {
                $emp = Employee::find($employeeId);
                return redirect()->back()->with('error', "Cannot assign {$emp->first_name}. They are already booked with another client between {$currentStartTime->format('h:i A')} and {$serviceEndTime->format('h:i A')}.");
            }

            // If safe, save to our temporary timeline array
            $timeline[] = [
                'service_id' => $service->id,
                'employee_id' => $employeeId,
                'start' => $currentStartTime->format('H:i:s'),
                'end' => $serviceEndTime->format('H:i:s')
            ];

            $currentStartTime = $serviceEndTime; // Move clock forward for the next service
        }

        // --- PASS 2: ACTUAL DATABASE UPDATE ---
        foreach ($timeline as $slot) {
            DB::table('booking_service')
                ->where('booking_id', $booking->id)
                ->where('service_id', $slot['service_id'])
                ->update([
                    'employee_id' => $slot['employee_id'],
                    'service_start_time' => $slot['start'],
                    'service_end_time' => $slot['end'],
                ]);
        }

        $booking->update(['status' => 'confirmed']);

        return redirect()->back()->with('success', 'Booking confirmed and employees securely assigned!');
    }

    // 3. Decline a Booking
    public function decline(Booking $booking)
    {
        $booking->update(['status' => 'declined']);
        return redirect()->back()->with('success', 'Booking declined. The calendar time slot is now free.');
    }

    public function complete(Booking $booking)
    {
        $booking->update(['status' => 'completed']);
        return redirect()->back()->with('success', 'Appointment successfully marked as completed!');
    }
}