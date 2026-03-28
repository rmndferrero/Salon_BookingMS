<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard - Sibs Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <style> body { font-family: 'Manrope', sans-serif; background-color: #f4f3f2; } </style>
</head>
<body class="text-[#1a1c1c]">

    <nav class="bg-[#b5106a] p-4 flex justify-between items-center text-white shadow-md">
        <div class="flex items-center gap-6">
            <div class="text-xl font-bold tracking-tight">Sib Style Admin</div>
            <a href="{{ route('manager.dashboard') }}" class="text-white font-bold text-sm border-b-2 border-white pb-1">Dashboard</a>
            <a href="{{ route('manager.services.index') }}" class="text-white/80 hover:text-white text-sm">Services</a>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-sm">Logged in as: {{ Auth::user()->first_name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-white text-[#b5106a] px-4 py-2 rounded font-bold text-xs uppercase tracking-wider hover:bg-gray-100 transition">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto p-8">
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-3xl font-bold mb-8">Dashboard Overview</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-2">Today's Bookings</h3>
                <p class="text-4xl font-bold text-[#b5106a]">{{ $todayBookingsCount }}</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-2">Pending Requests</h3>
                <p class="text-4xl font-bold {{ $pendingCount > 0 ? 'text-orange-500 animate-pulse' : 'text-[#b5106a]' }}">{{ $pendingCount }}</p>
            </div>

            <a href="{{ route('manager.services.index') }}" class="block bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-[#b5106a]/30 transition group">
                <div class="flex justify-between items-start">
                    <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-2 group-hover:text-[#b5106a] transition">Active Services</h3>
                    <span class="text-[#b5106a] opacity-0 group-hover:opacity-100 transition font-bold text-lg">→</span>
                </div>
                <p class="text-4xl font-bold text-[#b5106a]">{{ \App\Models\Service::count() }}</p>
            </a>
        </div>

        <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
            Needs Approval 
            @if($pendingCount > 0) <span class="bg-orange-500 text-white text-xs px-2 py-1 rounded-full">{{ $pendingCount }}</span> @endif
        </h2>
        
        <div class="bg-white rounded-xl shadow-sm border border-orange-200 p-6 mb-12">
            @forelse($pendingBookings as $booking)
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center border-b border-gray-100 pb-4 mb-4 last:border-0 last:pb-0 last:mb-0">
                    <div>
                        <p class="font-bold text-lg text-orange-600">
                            {{ \Carbon\Carbon::parse($booking->appointment_date)->format('D, M d, Y') }} at {{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }}
                        </p>
                        <p class="font-bold text-[#1a1c1c] text-xl mt-1">{{ $booking->user->first_name }} {{ $booking->user->last_name }}</p>
                        <p class="text-gray-500 text-sm mb-2">📞 {{ $booking->user->phone_number }}</p>
                        
                        <div class="flex flex-wrap gap-2 mt-2">
                            @foreach($booking->services as $service)
                                <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded font-semibold">{{ $service->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="mt-4 md:mt-0 flex items-center gap-4">
                        <div class="text-right mr-4 hidden md:block">
                            <span class="block text-xs text-gray-400 uppercase tracking-widest">Total</span>
                            <span class="font-bold text-lg">د.إ{{ number_format($booking->total_price, 2) }}</span>
                        </div>

                        <form action="{{ route('manager.bookings.decline', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to decline this? The slot will be freed.');">
                            @csrf
                            <button type="submit" class="bg-white border-2 border-gray-200 text-gray-500 hover:text-red-600 hover:border-red-600 px-6 py-2 rounded font-bold text-sm uppercase tracking-wider transition">Decline</button>
                        </form>

                        <form action="{{ route('manager.bookings.confirm', $booking->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-2 rounded font-bold text-sm uppercase tracking-wider transition shadow-lg shadow-orange-500/30">Confirm</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-sm italic text-center py-4">No pending requests at the moment. You're all caught up!</p>
            @endforelse
        </div>

        <h2 class="text-xl font-bold mb-4">Upcoming Confirmed Appointments</h2>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            @forelse($confirmedBookings as $booking)
                <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-4 last:border-0 last:pb-0 last:mb-0">
                    <div>
                        <p class="font-bold text-[#b5106a]">
                            {{ \Carbon\Carbon::parse($booking->appointment_date)->format('D, M d, Y') }} — {{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }} to {{ \Carbon\Carbon::parse($booking->end_time)->format('h:i A') }}
                        </p>
                        <p class="font-bold text-[#1a1c1c]">{{ $booking->user->first_name }} {{ $booking->user->last_name }}</p>
                        <p class="text-gray-500 text-sm">📞 {{ $booking->user->phone_number }}</p>
                    </div>
                    <div class="flex flex-col items-end">
                        <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wider mb-2">Confirmed</span>
                        <div class="flex gap-1">
                            @foreach($booking->services as $service)
                                <span class="bg-gray-50 text-gray-500 border border-gray-200 text-[10px] px-2 py-1 rounded">{{ $service->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-sm italic text-center py-4">No upcoming appointments scheduled yet.</p>
            @endforelse
        </div>

    </main>

</body>
</html>