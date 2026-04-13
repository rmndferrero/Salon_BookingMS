@extends('layouts.app')

@section('content')
<main class="pt-32 pb-20 px-6 md:px-8 max-w-screen-2xl mx-auto min-h-screen">
    
    <div class="flex flex-col lg:flex-row gap-10">
        <aside class="w-full lg:w-72 flex-shrink-0">
            <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100">
                
                <div class="mb-8 text-center pt-4">
                    <div class="w-24 h-24 bg-pink-50 rounded-full text-[#b5106a] flex items-center justify-center text-3xl font-headline font-bold mx-auto mb-4 border-4 border-white shadow-md">
                        {{ substr(Auth::user()->first_name, 0, 1) }}{{ substr(Auth::user()->last_name, 0, 1) }}
                    </div>
                    <h2 class="font-bold text-xl text-gray-900">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                    <p class="text-xs text-gray-500 mt-1 uppercase tracking-widest font-bold">VIP Member</p>
                </div>

                <nav class="space-y-2">
                    <a href="{{ route('customer.bookings') }}" class="flex items-center gap-3 px-5 py-4 bg-[#b5106a] text-white rounded-2xl font-bold text-sm transition-colors shadow-lg shadow-pink-500/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        My Bookings
                    </a>
                    <a href="{{ route('customer.info') }}" class="flex items-center gap-3 px-5 py-4 text-gray-600 hover:bg-pink-50 hover:text-[#b5106a] rounded-2xl font-bold text-sm transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Personal Info
                    </a>
                </nav>
            </div>
        </aside>

        <div class="flex-1">
            <h1 class="font-headline text-4xl mb-2 text-[#1a1c1c]">My Bookings</h1>
            <p class="text-gray-500 mb-10">Manage your upcoming appointments and view your past visits.</p>

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl mb-8 font-bold text-sm flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            <h2 class="text-xl font-800 mb-6 text-[#1a1c1c]">Upcoming Appointments</h2>
            <div class="space-y-5 mb-16">
                @forelse($upcomingBookings as $booking)
                    <div class="bg-white rounded-[2rem] p-6 md:p-8 border border-gray-100 shadow-sm flex flex-col md:flex-row justify-between items-start md:items-center gap-6 relative overflow-hidden group hover:border-pink-200 transition-colors">
                        
                        <div class="absolute top-0 right-0 px-5 py-1.5 rounded-bl-2xl text-[10px] font-bold uppercase tracking-widest {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">
                            {{ $booking->status }}
                        </div>

                        <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                            <div class="w-20 h-20 bg-pink-50 rounded-2xl flex flex-col items-center justify-center text-[#b5106a] border border-pink-100 flex-shrink-0">
                                <span class="text-xs font-bold uppercase tracking-widest">{{ \Carbon\Carbon::parse($booking->appointment_date)->format('M') }}</span>
                                <span class="text-3xl font-headline font-bold leading-none">{{ \Carbon\Carbon::parse($booking->appointment_date)->format('d') }}</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-2xl text-gray-900 mb-1">{{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }}</h3>
                                <p class="text-sm text-gray-500 mb-3">{{ $booking->services->pluck('name')->join(' • ') }}</p>
                                <p class="text-[11px] font-bold uppercase tracking-widest text-gray-400">Total: د.إ{{ number_format($booking->total_price, 2) }}</p>
                            </div>
                        </div>

                        <div class="w-full md:w-auto mt-4 md:mt-0">
                            <form action="{{ route('customer.bookings.cancel', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this appointment? This cannot be undone.');">
                                @csrf
                                <button type="submit" class="w-full md:w-auto px-6 py-3 bg-white border border-red-100 text-red-500 hover:bg-red-50 hover:border-red-200 rounded-xl font-bold text-xs uppercase tracking-widest transition-colors shadow-sm">
                                    Cancel Booking
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="bg-gray-50 rounded-[2rem] p-12 text-center border border-dashed border-gray-200">
                        <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-6 text-gray-400 shadow-sm">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <p class="text-gray-500 font-bold mb-6 text-lg">You have no upcoming appointments.</p>
                        <a href="{{ route('services') }}" class="inline-block bg-[#b5106a] text-white px-10 py-4 rounded-full font-bold text-sm uppercase tracking-widest hover:scale-105 transition-transform shadow-lg shadow-pink-500/30">
                            Book a Service
                        </a>
                    </div>
                @endforelse
            </div>

            <h2 class="text-xl font-800 mb-6 text-gray-400">Past & Cancelled</h2>
            <div class="space-y-4">
                @forelse($pastBookings as $booking)
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 opacity-75 hover:opacity-100 transition-opacity">
                        <div>
                            <p class="font-bold text-gray-800 text-lg">{{ \Carbon\Carbon::parse($booking->appointment_date)->format('M d, Y') }}</p>
                            <p class="text-sm text-gray-500 mt-1">{{ $booking->services->pluck('name')->join(' • ') }}</p>
                        </div>
                        
                        <div class="flex items-center gap-6 w-full md:w-auto justify-between md:justify-end border-t border-gray-50 md:border-t-0 pt-4 md:pt-0 mt-2 md:mt-0">
                            <span class="text-[10px] font-bold uppercase tracking-widest px-3 py-1.5 rounded-md
                                {{ $booking->status === 'completed' ? 'bg-green-50 text-green-600' : '' }}
                                {{ $booking->status === 'cancelled' ? 'bg-gray-100 text-gray-500' : '' }}
                                {{ $booking->status === 'declined' ? 'bg-red-50 text-red-500' : '' }}">
                                {{ $booking->status }}
                            </span>
                            
                            @if($booking->status === 'completed')
                                <a href="{{ route('services') }}" class="text-[#b5106a] hover:bg-pink-50 px-5 py-2.5 rounded-xl font-bold text-xs uppercase tracking-widest transition-colors">
                                    Book Again →
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400 text-sm italic py-4 pl-2">No past bookings found.</p>
                @endforelse
            </div>

        </div>
    </div>
</main>
@endsection