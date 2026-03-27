<nav class="fixed top-0 w-full z-50 bg-[#b5106a] backdrop-blur-xl">
    <div class="flex justify-between items-center px-8 py-4 max-w-screen-2xl mx-auto">

        <!-- LEFT -->
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

        <!-- RIGHT -->
        <div class="flex items-center gap-6">

            @auth
                <span class="text-white">Hello, {{ Auth::user()->first_name }}</span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-white/80 hover:text-white">Logout</button>
                </form>
            @endauth

            @guest
                <button onclick="toggleModal()" class="text-white">Login</button>

                <button onclick="toggleRegisterModal()" class="bg-white text-[#b5106a] px-6 py-2 rounded-full">
                    Register
                </button>
            @endguest

        </div>
    </div>
</nav>