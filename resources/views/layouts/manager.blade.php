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

    <!-- AlpineJs -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body class="flex min-h-screen text-[#1a1c1c]">

    <aside class="w-64 bg-sibs-pink text-white flex flex-col fixed h-full z-50">
        <div class="p-8">
            <h2 class="text-2xl font-800 tracking-tighter uppercase">Sibs <span class="font-light opacity-80 text-sm block tracking-widest uppercase">Admin</span></h2>
        </div>
        
        <nav class="flex-1 px-4 space-y-2">
            <a href="{{ route('manager.dashboard') }}" 
               class="flex items-center gap-3 p-4 rounded-xl transition-all {{ request()->routeIs('manager.dashboard') ? 'sidebar-link-active' : 'hover:bg-white/10 opacity-80 hover:opacity-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span class="font-bold text-sm">Dashboard</span>
            </a>

            <a href="{{ route('manager.services.index') }}" 
               class="flex items-center gap-3 p-4 rounded-xl transition-all {{ request()->routeIs('manager.services.*') ? 'sidebar-link-active' : 'hover:bg-white/10 opacity-80 hover:opacity-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                <span class="font-semibold text-sm">Services</span>
            </a>

            <a href="{{ route('manager.employees.index') }}" 
               class="flex items-center gap-3 p-4 rounded-xl transition-all {{ request()->routeIs('manager.employees.*') ? 'sidebar-link-active' : 'hover:bg-white/10 opacity-80 hover:opacity-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <span class="font-semibold text-sm">Staff Management</span>
            </a>

            <a href="{{ route('manager.announcements.index') }}" 
                class="flex items-center gap-3 p-4 rounded-xl transition-all {{ request()->routeIs('manager.announcements.*') ? 'sidebar-link-active' : 'hover:bg-white/10 opacity-80 hover:opacity-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.167H3.382a.75.75 0 01-.73-.96l.733-2.152a.75.75 0 01.73-.539h2.088l2.147-6.167a1.76 1.76 0 013.417.592zM15.817 7.893a7.5 7.5 0 010 8.214M18.913 5.483a12.008 12.008 0 010 13.034" />
                </svg>
                <span class="font-semibold text-sm">Announcements</span>
            </a>
        </nav>

        <div class="p-6 border-t border-white/10">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center font-bold text-xs">
                    {{ Auth::user() ? substr(Auth::user()->first_name, 0, 1) : 'M' }}
                </div>
                <span class="text-xs font-bold truncate">{{ Auth::user() ? Auth::user()->first_name : 'Manager' }}</span>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full bg-white/10 hover:bg-white hover:text-sibs-pink py-3 rounded-xl text-[10px] font-800 uppercase tracking-widest transition-all">Logout</button>
            </form>
        </div>
    </aside>

    <main class="flex-1 ml-64 p-10">
        @yield('content')
    </main>

</body>
</html>