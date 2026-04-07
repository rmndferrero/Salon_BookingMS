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

            <section>
                <h2 class="text-xl font-800 mb-6 px-2">Upcoming Confirmed Appointments</h2>
                <div class="sibs-card p-8 min-h-[120px] flex flex-col items-center justify-center">
                    @forelse($confirmedBookings as $booking)
                        <div class="w-full flex justify-between items-center py-4 border-b border-gray-50 last:border-0">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center text-green-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <p class="font-800 text-sm">{{ $booking->user->first_name }} {{ $booking->user->last_name }}</p>
                                    <p class="text-[10px] text-gray-400 font-700 uppercase tracking-tight">
                                        {{ \Carbon\Carbon::parse($booking->appointment_date)->format('M d') }} at {{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }}
                                    </p>
                                </div>
                            </div>
                            <span class="text-[10px] font-800 text-green-600 bg-green-50 px-3 py-1 rounded-full uppercase">Confirmed</span>
                        </div>
                    @empty
                        <p class="text-gray-400 text-sm italic font-medium">No upcoming appointments scheduled yet.</p>
                    @endforelse
                </div>
            </section>
        </div>
@endsection