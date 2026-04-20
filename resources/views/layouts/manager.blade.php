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
        .bg-sibs-pink { background-color: #b5106a; }
        .text-sibs-pink { color: #b5106a; }
        .border-sibs-pink { border-color: #b5106a; }
        .sibs-card { 
            background: white; 
            border: 1px solid #f3f3f3; 
            border-radius: 1.5rem; 
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); 
        }
        .navbar-link-active { color: white; font-weight: 700; }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="flex flex-col min-h-screen text-[#1a1c1c]">

    <nav class="fixed top-0 w-full z-50 bg-[#b5106a]">
        <div class="flex justify-between items-center px-8 py-4 max-w-screen-2xl mx-auto">

            {{-- Left: Logo + Brand --}}
            <div class="flex items-center">
                <a class="flex items-center" href="{{ route('manager.dashboard') }}">
                    <img class="h-10 w-auto invert brightness-0" src="{{ asset('sibs22.png') }}">
                    <span class="ml-4 text-2xl font-serif italic text-white tracking-tight">
                        Style Beauty Lounge
                    </span>
                </a>
            </div>

            {{-- Center: Nav Links --}}
            <div class="hidden md:flex gap-10 absolute left-1/2 transform -translate-x-1/2">
                <a href="{{ route('manager.dashboard') }}" 
                   class="transition-all {{ request()->routeIs('manager.dashboard') ? 'navbar-link-active' : 'text-white/90 hover:text-white' }}">
                    Dashboard
                </a>
                <a href="{{ route('manager.services.index') }}" 
                   class="transition-all {{ request()->routeIs('manager.services.*') ? 'navbar-link-active' : 'text-white/90 hover:text-white' }}">
                    Services
                </a>
                <a href="{{ route('manager.employees.index') }}" 
                   class="transition-all {{ request()->routeIs('manager.employees.*') ? 'navbar-link-active' : 'text-white/90 hover:text-white' }}">
                    Staff
                </a>
                <a href="{{ route('manager.settings') }}" 
                   class="transition-all {{ request()->routeIs('manager.settings') ? 'navbar-link-active' : 'text-white/90 hover:text-white' }}">
                    Settings
                </a>
                <a href="{{ route('manager.announcements.index') }}" 
                   class="transition-all {{ request()->routeIs('manager.announcements.*') ? 'navbar-link-active' : 'text-white/90 hover:text-white' }}">
                    Announcements
                </a>
            </div>

            {{-- Right: Profile dropdown --}}
            <div class="flex items-center gap-6">
                <div class="relative inline-block text-left">

                    <button id="profileDropdownBtn" class="focus:outline-none flex items-center justify-center w-10 h-10 rounded-full bg-white/20 hover:bg-white/30 transition-colors border border-white/30 shadow-sm">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </button>

                    <div id="profileDropdownMenu" class="hidden absolute right-0 mt-4 w-56 bg-white rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.1)] z-50 transform opacity-0 scale-95 transition-all duration-200 origin-top-right">

                        <div class="absolute -top-2 right-3 w-4 h-4 bg-white transform rotate-45 border-l border-t border-gray-100"></div>

                        <div class="relative bg-white rounded-2xl overflow-hidden border border-gray-100 flex flex-col">

                            <div class="px-5 py-4 border-b border-gray-50 bg-gray-50/50">
                                <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest">Signed in as</p>
                                <p class="text-sm font-bold text-gray-900 truncate">{{ Auth::user() ? Auth::user()->first_name : 'Manager' }}</p>
                            </div>

                            <div class="py-2">
                                <a href="{{ route('manager.dashboard') }}" class="flex items-center gap-3 px-5 py-2.5 text-sm font-semibold text-gray-700 hover:bg-pink-50 hover:text-[#b5106a] transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                    Dashboard
                                </a>
                                <a href="{{ route('manager.employees.index') }}" class="flex items-center gap-3 px-5 py-2.5 text-sm font-semibold text-gray-700 hover:bg-pink-50 hover:text-[#b5106a] transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    Staff Management
                                </a>
                                <a href="{{ route('manager.settings') }}" class="flex items-center gap-3 px-5 py-2.5 text-sm font-semibold text-gray-700 hover:bg-pink-50 hover:text-[#b5106a] transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    Settings
                                </a>
                                <a href="{{ route('manager.announcements.index') }}" class="flex items-center gap-3 px-5 py-2.5 text-sm font-semibold text-gray-700 hover:bg-pink-50 hover:text-[#b5106a] transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.167H3.382a.75.75 0 01-.73-.96l.733-2.152a.75.75 0 01.73-.539h2.088l2.147-6.167a1.76 1.76 0 013.417.592zM15.817 7.893a7.5 7.5 0 010 8.214M18.913 5.483a12.008 12.008 0 010 13.034" /></svg>
                                    Announcements
                                </a>
                            </div>

                            <div class="border-t border-gray-50 bg-gray-50/30">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-3 px-5 py-3 text-sm font-bold text-red-600 hover:bg-red-50 transition-colors text-left">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                        Log Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </nav>

    <main class="flex-1 mt-[72px] p-10">
        @yield('content')
    </main>

</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const profileBtn = document.getElementById('profileDropdownBtn');
        const profileMenu = document.getElementById('profileDropdownMenu');

        if (profileBtn && profileMenu) {
            profileBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                if (profileMenu.classList.contains('hidden')) {
                    profileMenu.classList.remove('hidden');
                    setTimeout(() => {
                        profileMenu.classList.remove('opacity-0', 'scale-95');
                        profileMenu.classList.add('opacity-100', 'scale-100');
                    }, 10);
                } else {
                    profileMenu.classList.remove('opacity-100', 'scale-100');
                    profileMenu.classList.add('opacity-0', 'scale-95');
                    setTimeout(() => {
                        profileMenu.classList.add('hidden');
                    }, 200);
                }
            });

            document.addEventListener('click', function(e) {
                if (!profileMenu.contains(e.target) && !profileBtn.contains(e.target)) {
                    if (!profileMenu.classList.contains('hidden')) {
                        profileMenu.classList.remove('opacity-100', 'scale-100');
                        profileMenu.classList.add('opacity-0', 'scale-95');
                        setTimeout(() => {
                            profileMenu.classList.add('hidden');
                        }, 200);
                    }
                }
            });
        }
    });
</script>