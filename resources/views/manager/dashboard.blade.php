<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sibs Command Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <style>
        body { font-family: 'Manrope', sans-serif; background-color: #fcfcfc; }
        /* Matching the sidebar to your brand magenta */
        .bg-sibs-pink { background-color: #b5106a; }
        .text-sibs-pink { color: #b5106a; }
        .border-sibs-pink { border-color: #b5106a; }
        /* Soft shadow and radius from your screenshots */
        .sibs-card { 
            background: white; 
            border: 1px solid #f3f3f3; 
            border-radius: 1.5rem; 
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); 
        }
        .sidebar-link-active { background: rgba(255,255,255,0.15); border-left: 4px solid white; }
    </style>
</head>
<body class="flex min-h-screen text-[#1a1c1c]">

    <aside class="w-64 bg-sibs-pink text-white flex flex-col fixed h-full z-50">
        <div class="p-8">
            <h2 class="text-2xl font-800 tracking-tighter uppercase">Sibs <span class="font-light opacity-80 text-sm block tracking-widest uppercase">Admin</span></h2>
        </div>
        
        <nav class="flex-1 px-4 space-y-2">
            <a href="{{ route('manager.dashboard') }}" class="flex items-center gap-3 p-4 rounded-xl sidebar-link-active transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span class="font-bold text-sm">Dashboard</span>
            </a>
            <a href="{{ route('manager.services.index') }}" class="flex items-center gap-3 p-4 rounded-xl hover:bg-white/10 transition-all opacity-80 hover:opacity-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                <span class="font-semibold text-sm">Services</span>
            </a>
        </nav>

        <div class="p-6 border-t border-white/10">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center font-bold text-xs">
                    {{ substr(Auth::user()->first_name, 0, 1) }}
                </div>
                <span class="text-xs font-bold truncate">{{ Auth::user()->first_name }}</span>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full bg-white/10 hover:bg-white hover:text-sibs-pink py-3 rounded-xl text-[10px] font-800 uppercase tracking-widest transition-all">Logout</button>
            </form>
        </div>
    </aside>

    <main class="flex-1 ml-64 p-10">
        
        <header class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-800 tracking-tight">Manager Dashboard</h1>
                <p class="text-gray-400 text-sm mt-1 italic">Welcome back, {{ Auth::user()->first_name }}</p>
            </div>
        </header>

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
                <div class="sibs-card p-8 min-h-[120px] flex items-center justify-center">
                    @forelse($pendingBookings as $booking)
                        <div class="w-full flex flex-col md:flex-row justify-between items-center border-b border-gray-50 pb-6 mb-6 last:border-0 last:pb-0 last:mb-0">
                            <div class="text-center md:text-left mb-4 md:mb-0">
                                <p class="text-sibs-pink font-800 text-sm tracking-wide">
                                    {{ \Carbon\Carbon::parse($booking->appointment_date)->format('D, M d, Y') }} @ {{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }}
                                </p>
                                <h3 class="text-xl font-800 mt-1">{{ $booking->user->first_name }} {{ $booking->user->last_name }}</h3>
                                <div class="flex gap-2 mt-3">
                                    @foreach($booking->services as $service)
                                        <span class="bg-gray-100 text-gray-500 text-[9px] font-bold px-3 py-1 rounded-full uppercase">{{ $service->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <form action="{{ route('manager.bookings.decline', $booking->id) }}" method="POST">
                                    @csrf
                                    <button class="px-6 py-2 border border-gray-200 text-gray-400 rounded-lg text-[10px] font-800 uppercase tracking-widest hover:border-red-500 hover:text-red-500 transition-all">Decline</button>
                                </form>
                                <form action="{{ route('manager.bookings.confirm', $booking->id) }}" method="POST">
                                    @csrf
                                    <button class="px-8 py-2 bg-sibs-pink text-white rounded-lg text-[10px] font-800 uppercase tracking-widest shadow-lg shadow-[#b5106a]/20 hover:scale-105 transition-all">Confirm</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-400 text-sm italic font-medium">No pending requests at the moment. You're all caught up!</p>
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
    </main>

</body>
</html>