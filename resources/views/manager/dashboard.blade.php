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

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-2">Today's Bookings</h3>
                <p class="text-4xl font-bold text-[#b5106a]">0</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-2">Pending Requests</h3>
                <p class="text-4xl font-bold text-[#b5106a]">0</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-2">Active Services</h3>
                <p class="text-4xl font-bold text-[#b5106a]">{{ \App\Models\Service::count() }}</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-xl font-bold mb-4">Upcoming Appointments</h2>
            <p class="text-gray-500 text-sm">No appointments scheduled yet. Once customers book services, they will appear here.</p>
        </div>

    </main>

</body>
</html>