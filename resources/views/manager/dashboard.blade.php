@extends('layouts.manager')

@section('content')      
        <header class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-800 tracking-tight">Manager Dashboard</h1>
                <p class="text-gray-400 text-sm mt-1 italic">Welcome back, {{ Auth::user()->first_name }}</p>
            </div>
        </header>

        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-8 font-bold text-sm tracking-wide">
                {{ session('error') }}
            </div>
        @endif
        
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-8 font-bold text-sm tracking-wide">
                {{ session('success') }}
            </div>
        @endif


        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="sibs-card p-8">
                <p class="text-[11px] font-700 uppercase tracking-wider text-gray-400 mb-2">Today's Bookings</p>
                <span class="text-5xl font-800 text-sibs-pink tracking-tighter">{{ $todayBookingsCount }}</span>
            </div>

            <div class="sibs-card p-8">
                <p class="text-[11px] font-700 uppercase tracking-wider text-gray-400 mb-2">Pending Requests</p>
                <span class="text-5xl font-800 text-sibs-pink tracking-tighter">{{ $pendingCount }}</span>
            </div>

            <div class="sibs-card p-8">
                <p class="text-[11px] font-700 uppercase tracking-wider text-gray-400 mb-2">Active Services</p>
                <span class="text-5xl font-800 text-sibs-pink tracking-tighter">{{ \App\Models\Service::count() }}</span>
            </div>
        </div>
        <section class="mb-12">
            <h2 class="text-xl font-800 mb-6 px-2">Calendar</h2>
            
            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-6 overflow-x-auto custom-scrollbar">
                <div class="min-w-[1000px] grid grid-cols-7 gap-4">
                    
                    @php
                        $startDate = now();
                    @endphp

                    @for($i = 0; $i < 7; $i++)
                        @php
                            $currentDate = $startDate->copy()->addDays($i);
                            $dateString = $currentDate->toDateString();
                            
                            // Filter our existing master list for this specific column's day
                            $dayBookings = $allUpcomingBookings->where('appointment_date', $dateString);
                        @endphp

                        <div class="flex flex-col">
                            <div class="text-center mb-4">
                                <p class="text-xs font-bold uppercase tracking-widest {{ $i === 0 ? 'text-[#b5106a]' : 'text-gray-400' }}">
                                    {{ $i === 0 ? 'Today' : $currentDate->format('D') }}
                                </p>
                                <p class="text-2xl font-headline font-bold {{ $i === 0 ? 'text-[#b5106a]' : 'text-[#1a1c1c]' }}">
                                    {{ $currentDate->format('d') }}
                                </p>
                            </div>

                            <div class="space-y-3 flex-1 bg-gray-50 rounded-2xl p-3 border {{ $i === 0 ? 'border-pink-100 bg-pink-50/30' : 'border-gray-100' }} min-h-[300px]">
                                @forelse($dayBookings as $booking)
                                    <div class="bg-white p-3 rounded-xl border border-green-200 shadow-sm hover:shadow-md hover:border-[#b5106a] transition-all cursor-default group relative">
                                        
                                        <div class="flex justify-between items-start mb-2">
                                            <p class="font-bold text-[#b5106a] text-xs">{{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }}</p>
                                            <span class="w-2 h-2 rounded-full bg-green-400"></span>
                                        </div>
                                        <p class="font-bold text-[#1a1c1c] text-[12px] leading-tight truncate">
                                            {{ $booking->user->first_name }} {{ substr($booking->user->last_name, 0, 1) }}.
                                        </p>

                                        <div class="flex flex-wrap gap-1 mt-2">
                                            @foreach($booking->services as $service)
                                                @php 
                                                    $emp = $employees->firstWhere('id', $service->pivot->employee_id); 
                                                @endphp
                                                <span class="text-[9px] bg-gray-50 border border-gray-100 text-gray-600 px-1.5 py-0.5 rounded font-bold">
                                                    {{ $service->name }} <span class="text-gray-400">({{ $emp ? substr($emp->first_name, 0, 3) : '...' }})</span>
                                                </span>
                                            @endforeach
                                        </div>

                                        <div class="absolute inset-0 bg-[#1a1c1c]/95 text-white p-3 rounded-xl opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity z-10 flex flex-col justify-center backdrop-blur-sm">
                                            <p class="text-[10px] font-bold uppercase tracking-widest text-pink-300 mb-1">Full Details</p>
                                            <p class="text-xs font-bold mb-1">{{ $booking->user->first_name }} {{ $booking->user->last_name }}</p>
                                            <p class="text-[10px] text-gray-300">📞 {{ $booking->user->phone_number }}</p>
                                            <p class="text-[10px] text-gray-300 mt-1">Total: د.إ{{ number_format($booking->total_price, 2) }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <div class="flex items-center justify-center h-full text-gray-300 text-[10px] font-bold uppercase tracking-widest text-center opacity-50">
                                        No<br>Bookings
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    @endfor

                </div>
            </div>
        </section>
        <div class="space-y-10">
            <section>
                <h2 class="text-xl font-800 mb-6 px-2">Needs Approval</h2>
                <div class="bg-white rounded-xl shadow-sm border border-orange-200 p-6 mb-12">
            @forelse($pendingBookings as $booking)
                <div class="border-b border-gray-100 pb-6 mb-6 last:border-0 last:pb-0 last:mb-0">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="font-bold text-lg text-orange-600">
                                {{ \Carbon\Carbon::parse($booking->appointment_date)->format('D, M d, Y') }} at {{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }}
                            </p>
                            <p class="font-bold text-[#1a1c1c] text-xl mt-1">{{ $booking->user->first_name }} {{ $booking->user->last_name }}</p>
                            <p class="text-gray-500 text-sm">📞 {{ $booking->user->phone_number }}</p>
                        </div>
                        <div class="text-right hidden md:block">
                            <span class="block text-xs text-gray-400 uppercase tracking-widest">Total</span>
                            <span class="font-bold text-lg">د.إ{{ number_format($booking->total_price, 2) }}</span>
                        </div>
                    </div>

                    <div class="bg-orange-50 rounded-lg p-4 border border-orange-100">
                        <form action="{{ route('manager.bookings.confirm', $booking->id) }}" method="POST">
                            @csrf
                            <h4 class="text-xs font-bold text-orange-800 uppercase tracking-widest mb-3">Assign Staff (Sequential Order)</h4>
                            
                            <div class="space-y-3 mb-4">
                                @foreach($booking->services as $service)
                                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-2">
                                        <span class="text-sm font-semibold text-gray-700">
                                            {{ $service->name }} <span class="text-xs text-gray-400 font-normal">({{ $service->duration_minutes }}m)</span>
                                        </span>
                                        
                                        <select name="assignments[{{ $service->id }}]" required class="border-orange-200 rounded p-1.5 text-sm outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 bg-white min-w-[200px]">
                                            <option value="">Select Employee...</option>
                                            @foreach($employees as $employee)
                                                {{-- Smart Filter: Only show employees who have this service category in their JSON array --}}
                                                @if(is_array($employee->can_do) && in_array($service->category, $employee->can_do))
                                                    <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                            </div>

                            <div class="flex justify-end gap-3 mt-4 pt-4 border-t border-orange-100">
                                <button type="button" onclick="document.getElementById('decline-form-{{ $booking->id }}').submit();" class="bg-white border border-gray-300 text-gray-600 hover:bg-gray-50 px-6 py-2 rounded font-bold text-sm uppercase tracking-wider transition">
                                    Decline
                                </button>
                                
                                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-2 rounded font-bold text-sm uppercase tracking-wider transition shadow-lg shadow-orange-500/30">
                                    Confirm & Assign
                                </button>
                            </div>
                        </form>
                        
                        <form id="decline-form-{{ $booking->id }}" action="{{ route('manager.bookings.decline', $booking->id) }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-sm italic text-center py-4">No pending requests at the moment. You're all caught up!</p>
            @endforelse
        </div>
            </section>

            <section class="mb-12">
            <div class="flex justify-between items-end mb-6 px-2">
                <h2 class="text-xl font-800">Upcoming Appointments <span class="text-xs font-normal text-gray-400 ml-2">(Next 48 Hours)</span></h2>
                <button onclick="document.getElementById('upcoming-modal').classList.remove('hidden')" class="text-xs font-bold text-[#b5106a] hover:underline uppercase tracking-widest">
                    Show All Upcoming →
                </button>
            </div>
            
            <div class="sibs-card p-6 min-h-[120px] flex flex-col">
                @forelse($confirmedBookings as $booking)
                    <div class="w-full flex flex-col md:flex-row justify-between items-start md:items-center py-5 border-b border-gray-100 last:border-0 gap-4">
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center text-green-600 flex-shrink-0 mt-1">
                                <span class="font-bold text-sm">{{ \Carbon\Carbon::parse($booking->appointment_date)->format('d') }}</span>
                            </div>
                            <div>
                                <p class="font-800 text-lg">{{ $booking->user->first_name }} {{ $booking->user->last_name }}</p>
                                <p class="text-[11px] text-gray-500 font-700 uppercase tracking-wide mb-2">
                                    {{ \Carbon\Carbon::parse($booking->appointment_date)->format('M d, Y') }} at {{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }}
                                </p>
                                
                                <div class="flex flex-wrap gap-2">
                                    @foreach($booking->services as $service)
                                        @php 
                                            // Find the employee assigned to this specific service pivot
                                            $emp = $employees->firstWhere('id', $service->pivot->employee_id); 
                                        @endphp
                                        <span class="text-[10px] text-gray-600 bg-gray-50 px-2.5 py-1 rounded-md border border-gray-200 font-bold tracking-wide">
                                            {{ $service->name }} <span class="text-[#b5106a]">({{ $emp ? $emp->first_name : 'Unassigned' }})</span>
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 mt-4 md:mt-0">
                            <form action="{{ route('manager.bookings.cancel', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this appointment? The customer will lose this time slot.');">
                                @csrf
                                <button type="submit" class="bg-white border border-red-200 text-red-500 hover:bg-red-50 px-4 py-2 rounded-lg font-bold text-xs uppercase tracking-wider transition-colors shadow-sm flex items-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    Cancel
                                </button>
                            </form>

                            <form action="{{ route('manager.bookings.complete', $booking->id) }}" method="POST" onsubmit="return confirm('Mark this appointment as completed?');">
                                @csrf
                                <button type="submit" class="bg-white border border-green-200 text-green-600 hover:bg-green-50 px-4 py-2 rounded-lg font-bold text-xs uppercase tracking-wider transition-colors shadow-sm flex items-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    Complete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <p class="text-gray-400 text-sm italic font-medium">No upcoming appointments scheduled for the next 2 days.</p>
                    </div>
                @endforelse
            </div>
        </section>

        <section>
            <div class="flex justify-between items-end mb-6 px-2">
                <h2 class="text-xl font-800 px-2">Recently Declined</h2>
                <button onclick="document.getElementById('declined-modal').classList.remove('hidden')" class="text-xs font-bold text-[#b5106a] hover:underline uppercase tracking-widest">
                    Show All Declined →
                </button>
            </div>
            
            <div class="sibs-card p-6">
                @forelse($recentDeclinedBookings as $booking)
                    <div class="flex justify-between items-center py-3 border-b border-gray-50 last:border-0 opacity-75 grayscale hover:grayscale-0 transition-all">
                        <div>
                            <p class="font-bold text-sm text-gray-700">{{ $booking->user->first_name }} {{ $booking->user->last_name }}</p>
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">
                                {{ \Carbon\Carbon::parse($booking->appointment_date)->format('M d') }} • {{ $booking->services->pluck('name')->join(', ') }}
                            </p>
                        </div>
                        <span class="text-[9px] font-bold text-red-500 bg-red-50 px-2 py-1 rounded uppercase tracking-widest">Declined</span>
                    </div>
                @empty
                    <p class="text-gray-400 text-sm italic text-center py-4">No declined bookings.</p>
                @endforelse
            </div>
        </section>
    </div>

    <div id="declined-modal" class="fixed inset-0 bg-[#1a1c1c]/80 z-[100] hidden flex items-center justify-center backdrop-blur-sm transition-opacity p-4 md:p-8">
        <div class="bg-white w-full max-w-4xl h-[80vh] rounded-[2rem] shadow-2xl flex flex-col overflow-hidden relative">
            
            <div class="p-6 md:p-8 border-b border-gray-100 flex justify-between items-center bg-white z-10">
                <div>
                    <h2 class="font-headline text-3xl text-[#1a1c1c]">Declined Bookings History</h2>
                    <p class="text-gray-500 text-sm mt-1">A complete log of all rejected appointment requests.</p>
                </div>
                <button onclick="document.getElementById('declined-modal').classList.add('hidden')" class="text-gray-400 hover:text-[#b5106a] text-4xl leading-none">&times;</button>
            </div>

            <div class="flex-1 overflow-auto bg-gray-50 p-6 md:p-8">
                <div class="space-y-4">
                    @forelse($allDeclinedBookings as $booking)
                        <div class="bg-white p-5 rounded-xl border border-red-100 shadow-sm flex justify-between items-center">
                            <div>
                                <p class="font-bold text-lg">{{ $booking->user->first_name }} {{ $booking->user->last_name }}</p>
                                <p class="text-xs text-gray-500 font-bold uppercase tracking-widest mt-1">
                                    Requested for: <span class="text-red-500">{{ \Carbon\Carbon::parse($booking->appointment_date)->format('M d, Y') }} at {{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }}</span>
                                </p>
                                <p class="text-sm text-gray-600 mt-2">
                                    <span class="font-bold">Services:</span> {{ $booking->services->pluck('name')->join(', ') }}
                                </p>
                            </div>
                            <div class="text-right hidden md:block">
                                <p class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">Declined On</p>
                                <p class="text-sm font-bold text-gray-700">{{ $booking->updated_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-20 text-gray-400 font-bold">Your history is clean. No declined bookings found.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div id="upcoming-modal" class="fixed inset-0 bg-[#1a1c1c]/80 z-[100] hidden flex items-center justify-center backdrop-blur-sm transition-opacity p-4 md:p-8">
        <div class="bg-white w-full max-w-5xl h-[85vh] rounded-[2rem] shadow-2xl flex flex-col overflow-hidden relative">
            
            <div class="p-6 md:p-8 border-b border-gray-100 flex justify-between items-center bg-white z-10">
                <div>
                    <h2 class="font-headline text-3xl text-[#1a1c1c]">All Upcoming Appointments</h2>
                    <p class="text-gray-500 text-sm mt-1">Your complete master schedule for all confirmed future bookings.</p>
                </div>
                <button onclick="document.getElementById('upcoming-modal').classList.add('hidden')" class="text-gray-400 hover:text-[#b5106a] text-4xl leading-none">&times;</button>
            </div>

            <div class="flex-1 overflow-auto bg-gray-50 p-6 md:p-8">
                <div class="space-y-4">
                    @forelse($allUpcomingBookings as $booking)
                        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex flex-col md:flex-row justify-between items-start md:items-center gap-4 hover:border-pink-200 transition-colors">
                            
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-xl bg-pink-50 flex items-center justify-center text-[#b5106a] flex-shrink-0 mt-1 border border-pink-100">
                                    <span class="font-bold text-sm">{{ \Carbon\Carbon::parse($booking->appointment_date)->format('d') }}</span>
                                </div>
                                <div>
                                    <p class="font-800 text-lg">{{ $booking->user->first_name }} {{ $booking->user->last_name }}</p>
                                    <p class="text-[11px] text-gray-500 font-700 uppercase tracking-wide mb-3">
                                        {{ \Carbon\Carbon::parse($booking->appointment_date)->format('D, M d, Y') }} at {{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }}
                                    </p>
                                    
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($booking->services as $service)
                                            @php 
                                                $emp = $employees->firstWhere('id', $service->pivot->employee_id); 
                                            @endphp
                                            <span class="text-[10px] text-gray-600 bg-gray-50 px-2.5 py-1 rounded-md border border-gray-200 font-bold tracking-wide">
                                                {{ $service->name }} <span class="text-[#b5106a]">({{ $emp ? $emp->first_name : 'Unassigned' }})</span>
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        <div class="flex items-center gap-2 mt-4 md:mt-0">
                            <form action="{{ route('manager.bookings.cancel', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this appointment? The customer will lose this time slot.');">
                                @csrf
                                <button type="submit" class="bg-white border border-red-200 text-red-500 hover:bg-red-50 px-4 py-2 rounded-lg font-bold text-xs uppercase tracking-wider transition-colors shadow-sm flex items-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    Cancel
                                </button>
                            </form>

                            <form action="{{ route('manager.bookings.complete', $booking->id) }}" method="POST" onsubmit="return confirm('Mark this appointment as completed?');">
                                @csrf
                                <button type="submit" class="bg-white border border-green-200 text-green-600 hover:bg-green-50 px-4 py-2 rounded-lg font-bold text-xs uppercase tracking-wider transition-colors shadow-sm flex items-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    Complete
                                </button>
                            </form>
                        </div>

                        </div>
                    @empty
                        <div class="text-center py-20">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <p class="text-gray-500 font-bold">No upcoming appointments scheduled yet.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection