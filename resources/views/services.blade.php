<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "primary": "#b5106a",
                        "on-surface": "#1a1c1c",
                        "on-surface-variant": "#584048",
                        "surface-container": "#eeeeed",
                    },
                    fontFamily: {
                        "headline": ["Noto Serif"],
                        "body": ["Manrope"],
                    },
                },
            },
        }
    </script>
    <style>
        body { background-color: #FFECF0; font-family: 'Manrope', sans-serif; }
    </style>
</head>

<body class="antialiased text-on-surface">

    <nav class="fixed top-0 w-full z-50 bg-[#b5106a] backdrop-blur-xl">
        <div class="flex justify-between items-center px-8 py-4 max-w-screen-2xl mx-auto text-white">
            <a class="flex items-center" href="{{ route('homepage') }}">
                <span class="text-2xl font-serif italic tracking-tight">Style Beauty Lounge</span>
            </a>
            <div class="hidden md:flex gap-10">
                <a class="hover:opacity-70 transition-opacity" href="{{ route('homepage') }}">Home</a>
                <a class="font-bold underline underline-offset-8" href="{{ route('services') }}">Services</a>
                <a class="hover:opacity-70 transition-opacity" href="{{ route('about') }}">About</a>
                <a class="hover:opacity-70 transition-opacity" href="{{ route('contact') }}">Contact</a>
            </div>
            <div>
                <a href="{{ route('book') }}" class="bg-white text-[#b5106a] px-6 py-2 rounded-full font-semibold text-sm">Book Now</a>
            </div>
        </div>
    </nav>

    <main class="pt-32 pb-20 px-8 max-w-screen-2xl mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <span class="text-primary font-bold tracking-[0.3em] uppercase text-xs mb-4 block">The Selection</span>
            <h1 class="font-headline text-5xl md:text-6xl mb-6">Our Specialized Care</h1>
            <p class="text-on-surface-variant font-light text-lg">
                Discover a curated collection of beauty treatments designed to rejuvenate your spirit and enhance your natural glow.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <a href="#nail-care-menu" class="group relative block h-[450px] overflow-hidden rounded-2xl bg-surface-container shadow-sm">
                <img src="https://images.unsplash.com/photo-1604654894610-df63bc536371?q=80&w=800&auto=format&fit=crop" 
                     alt="Nail Care" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-8">
                    <h3 class="font-headline text-3xl text-white">Nail Care</h3>
                    <p class="text-white/70 font-body text-sm mt-2 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                        Manicures, Pedicures & Artisan Polish
                    </p>
                </div>
            </a>

            <a href="#eyelash-menu" class="group relative block h-[450px] overflow-hidden rounded-2xl bg-surface-container shadow-sm">
                <img src="https://images.unsplash.com/photo-1583001931036-6433ff8550f4?q=80&w=800&auto=format&fit=crop" 
                     alt="Eyelashing" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-8">
                    <h3 class="font-headline text-3xl text-white">Eyelashing</h3>
                    <p class="text-white/70 font-body text-sm mt-2 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                        Extensions, Lifts & Brow Shaping
                    </p>
                </div>
            </a>

            <a href="#facial-menu" class="group relative block h-[450px] overflow-hidden rounded-2xl bg-surface-container shadow-sm">
                <img src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?q=80&w=800&auto=format&fit=crop" 
                     alt="Facial" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-8">
                    <h3 class="font-headline text-3xl text-white">Facial & Threading</h3>
                    <p class="text-white/70 font-body text-sm mt-2 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                        Skin Therapy & Precision Threading
                    </p>
                </div>
            </a>

            <a href="#hair-menu" class="group relative block h-[450px] overflow-hidden rounded-2xl bg-surface-container shadow-sm">
                <img src="https://images.unsplash.com/photo-1562322140-8baeececf3df?q=80&w=800&auto=format&fit=crop" 
                     alt="Hair Services" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-8">
                    <h3 class="font-headline text-3xl text-white">Hair Services</h3>
                    <p class="text-white/70 font-body text-sm mt-2 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                        Cut, Color & Signature Styling
                    </p>
                </div>
            </a>

            <a href="#waxing-menu" class="group relative block h-[450px] overflow-hidden rounded-2xl bg-surface-container shadow-sm">
                <img src="https://images.unsplash.com/photo-1596178065829-446f037f9617?q=80&w=800&auto=format&fit=crop" 
                     alt="Waxing" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-8">
                    <h3 class="font-headline text-3xl text-white">Waxing</h3>
                    <p class="text-white/70 font-body text-sm mt-2 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                        Smooth & Gentle Hair Removal
                    </p>
                </div>
            </a>

            <a href="#massage-menu" class="group relative block h-[450px] overflow-hidden rounded-2xl bg-surface-container shadow-sm">
                <img src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?q=80&w=800&auto=format&fit=crop" 
                     alt="Massage" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-8">
                    <h3 class="font-headline text-3xl text-white">Relaxing Massage</h3>
                    <p class="text-white/70 font-body text-sm mt-2 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                        Full Body Relaxation & Stone Therapy
                    </p>
                </div>
            </a>

        </div>

        @include('partials.nail-menu')
        @include('partials.eyelash-menu')
        @include('partials.facial-menu')
        @include('partials.hair-menu')
        @include('partials.waxing-menu')
        @include('partials.massage-menu')

    </main>

  <!-- Footer -->
    <footer class="bg-[#f4f3f2] pt-20 pb-10">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 px-12 max-w-7xl mx-auto">
            <div class="col-span-1">
                <h2 class="text-xl font-serif text-[#b5106a] mb-6">Location</h2>
                <p class="text-stone-500 font-body text-sm leading-relaxed">
                    Al Hashar Building - Salah Al Din St - Office no 301 - Main Road - next to Crown Plaza Hotel - Muteena - Deira , Dubai, United Arab Emirates, 0000
                </p>
            </div>
            <div>
                <h4 class="font-label text-xs font-bold uppercase tracking-widest text-[#b5106a] mb-6">Navigation</h4>
                <ul class="space-y-4">
                    <li><a class="text-stone-500 text-sm hover:text-[#b5106a] transition-colors" href="#services">Services</a></li>
                    <li><a class="text-stone-500 text-sm hover:text-[#b5106a] transition-colors" href="#gallery">Gallery</a></li>
                    <li><a class="text-stone-500 text-sm hover:text-[#b5106a] transition-colors" href="#about">About</a></li>
                    <li><a class="text-stone-500 text-sm hover:text-[#b5106a] transition-colors" href="#contact">Contact</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-label text-xs font-bold uppercase tracking-widest text-[#b5106a] mb-6">Legal</h4>
                <ul class="space-y-4">
                    <li><a class="text-stone-500 text-sm hover:text-[#b5106a] transition-colors" href="#">Privacy Policy</a></li>
                    <li><a class="text-stone-500 text-sm hover:text-[#b5106a] transition-colors" href="#">Terms of Service</a></li>
                    <li><a class="text-stone-500 text-sm hover:text-[#b5106a] transition-colors" href="#">Careers</a></li>
                    <li><a class="text-stone-500 text-sm hover:text-[#b5106a] transition-colors" href="#">Sustainability</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-label text-xs font-bold uppercase tracking-widest text-[#b5106a] mb-6">Social</h4>
                <div class="flex gap-4">
                    <a class="h-10 w-10 rounded-full bg-white flex items-center justify-center text-primary shadow-sm hover:scale-110 transition-transform" href="#">
                        <span class="material-symbols-outlined text-lg">public</span>
                    </a>
                    <a class="h-10 w-10 rounded-full bg-white flex items-center justify-center text-primary shadow-sm hover:scale-110 transition-transform" href="#">
                        <span class="material-symbols-outlined text-lg">face</span>
                    </a>
                    <a class="h-10 w-10 rounded-full bg-white flex items-center justify-center text-primary shadow-sm hover:scale-110 transition-transform" href="#">
                        <span class="material-symbols-outlined text-lg">camera</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-20 px-12 max-w-7xl mx-auto pt-8 border-t border-stone-200">
            <p class="text-stone-400 font-label text-[10px] uppercase tracking-[0.2em] text-center">
                © 2024 Sib Style Beauty Lounge. The Curated Sanctuary.
            </p>
        </div>
    </footer>

        <!--Login Modal-->

        <div id="loginModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center bg-black/60 backdrop-blur-sm px-4">
        <div class="bg-white w-full max-w-md rounded-3xl overflow-hidden shadow-2xl transform transition-all">
            <div class="p-8 relative">
                <button onclick="toggleModal()" class="absolute top-6 right-6 text-on-surface-variant hover:text-primary transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>

                <div class="text-center mb-8">
                    <h2 class="font-headline text-3xl text-on-surface mb-2">Welcome Back</h2>
                    <p class="font-body text-on-surface-variant text-sm">Enter your details to access the sanctuary.</p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="phone_number" class="block font-label text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Phone Number</label>
                        <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" 
                            class="w-full bg-surface-container-low border-none rounded-full px-6 py-3 focus:ring-2 focus:ring-primary/20 outline-none font-body" required>
                        @error('phone_number') <span class="text-error text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="password" class="block font-label text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Password</label>
                        <input type="password" id="password" name="password" 
                            class="w-full bg-surface-container-low border-none rounded-full px-6 py-3 focus:ring-2 focus:ring-primary/20 outline-none font-body" required>
                        @error('password') <span class="text-error text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="w-full bg-primary text-white py-4 rounded-full font-label font-bold text-xs uppercase tracking-widest hover:opacity-90 transition-all shadow-lg shadow-primary/20">
                        Log In
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-sm text-on-surface-variant font-body">
                        New to Sibs? <a href="{{ route('register') }}" class="text-primary font-bold hover:underline">Create an account</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>