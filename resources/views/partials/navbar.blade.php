<nav class="fixed top-0 w-full z-50 bg-[#b5106a] backdrop-blur-xl">
    <div class="flex justify-between items-center px-8 py-4 max-w-screen-2xl mx-auto">

        <div class="flex items-center gap-8">
            <a class="flex items-center" href="#">
                <img class="h-10 w-auto invert brightness-0" src="{{ asset('sibs22.png') }}">
                <span class="ml-4 text-2xl font-serif italic text-white tracking-tight">
                    Style Beauty Lounge
                </span>
            </a>

            <div class="hidden md:flex gap-10 absolute left-1/2 transform -translate-x-1/2">
                <a class="text-white/90 hover:text-white" href="{{ route('homepage') }}">Home</a>
                <a class="text-white/90 hover:text-white" href="{{ route('services') }}">Services</a>
                <a class="text-white/90 hover:text-white" href="{{ route('about') }}">About</a>
                <a class="text-white/90 hover:text-white" href="{{ route('contact') }}">Contact</a>
            </div>
        </div>

        <div class="flex items-center gap-6">

            @auth
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
                                <p class="text-sm font-bold text-gray-900 truncate">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                            </div>

                            <div class="md:hidden py-1 border-b border-gray-50">
                                <a href="{{ route('homepage') }}" class="block px-5 py-2.5 text-sm font-semibold text-gray-700 hover:bg-pink-50 hover:text-[#b5106a] transition-colors">Home</a>
                                <a href="{{ route('services') }}" class="block px-5 py-2.5 text-sm font-semibold text-gray-700 hover:bg-pink-50 hover:text-[#b5106a] transition-colors">Services</a>
                                <a href="{{ route('about') }}" class="block px-5 py-2.5 text-sm font-semibold text-gray-700 hover:bg-pink-50 hover:text-[#b5106a] transition-colors">About</a>
                                <a href="{{ route('contact') }}" class="block px-5 py-2.5 text-sm font-semibold text-gray-700 hover:bg-pink-50 hover:text-[#b5106a] transition-colors">Contact</a>
                            </div>

                            <div class="py-2">
                                <a href="{{ route('customer.bookings') }}" class="flex items-center gap-3 px-5 py-2.5 text-sm font-semibold text-gray-700 hover:bg-pink-50 hover:text-[#b5106a] transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    My Bookings
                                </a>
                                <a href="{{ route('customer.info') }}" class="flex items-center gap-3 px-5 py-2.5 text-sm font-semibold text-gray-700 hover:bg-pink-50 hover:text-[#b5106a] transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    Personal Info
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
            @endauth

            @guest
                <div class="hidden md:flex items-center gap-4">
                    <button onclick="toggleModal()" class="text-white font-medium hover:text-gray-200 transition-colors">
                        Login
                    </button>
                    <button onclick="toggleRegisterModal()" class="bg-white text-[#b5106a] px-6 py-2 rounded-full font-bold shadow-md hover:scale-105 transition-transform">
                        Register
                    </button>
                </div>

                <div class="md:hidden relative" x-data="{ open: false }">
                    {{-- Hamburger Button --}}
                    <button @click="open = !open"
                        class="flex flex-col justify-center items-center w-10 h-10 gap-[6px] focus:outline-none"
                        aria-label="Menu">
                        <span class="block w-7 h-[3px] bg-white rounded-full transition-all duration-300"
                              :class="open ? 'rotate-45 translate-y-[9px]' : ''"></span>
                        <span class="block w-7 h-[3px] bg-white rounded-full transition-all duration-300"
                              :class="open ? 'opacity-0 scale-x-0' : ''"></span>
                        <span class="block w-7 h-[3px] bg-white rounded-full transition-all duration-300"
                              :class="open ? '-rotate-45 -translate-y-[9px]' : ''"></span>
                    </button>

                    {{-- Dropdown --}}
                    <div x-show="open"
                         x-cloak
                         @click.outside="open = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 -translate-y-2"
                         class="absolute right-0 mt-3 w-48 bg-white rounded-2xl shadow-xl py-2 z-50 overflow-hidden">

                        {{-- Nav Links --}}
                        <div>
                            <a href="{{ route('homepage') }}"
                               class="block px-5 py-3 text-sm font-semibold text-gray-700 hover:bg-pink-50 hover:text-[#b5106a] transition-colors">
                                Home
                            </a>
                            <a href="{{ route('services') }}"
                               class="block px-5 py-3 text-sm font-semibold text-gray-700 hover:bg-pink-50 hover:text-[#b5106a] transition-colors">
                                Services
                            </a>
                            <a href="{{ route('about') }}"
                               class="block px-5 py-3 text-sm font-semibold text-gray-700 hover:bg-pink-50 hover:text-[#b5106a] transition-colors">
                                About
                            </a>
                            <a href="{{ route('contact') }}"
                               class="block px-5 py-3 text-sm font-semibold text-gray-700 hover:bg-pink-50 hover:text-[#b5106a] transition-colors">
                                Contact
                            </a>
                            <div class="mx-4 border-t border-pink-100 my-1"></div>
                        </div>

                        {{-- Auth Buttons --}}
                        <button onclick="toggleModal(); $data.open = false"
                            class="w-full text-left px-5 py-3 text-[#b5106a] font-semibold hover:bg-pink-50 transition-colors">
                            Login
                        </button>

                        <div class="mx-4 border-t border-pink-100"></div>

                        <button onclick="toggleRegisterModal(); $data.open = false"
                            class="w-full text-left px-5 py-3 text-[#b5106a] font-bold hover:bg-pink-50 transition-colors">
                            Register
                        </button>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</nav>

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