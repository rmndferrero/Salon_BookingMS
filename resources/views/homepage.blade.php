<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "tertiary-container": "#9b687b",
                        "error": "#ba1a1a",
                        "primary": "#b5106a",
                        "on-secondary-fixed-variant": "#574500",
                        "on-secondary-container": "#725a00",
                        "on-secondary": "#ffffff",
                        "inverse-primary": "#ffb0cc",
                        "surface-dim": "#dadad9",
                        "outline": "#8b7078",
                        "on-surface-variant": "#584048",
                        "surface-container": "#eeeeed",
                        "primary-fixed-dim": "#ffb0cc",
                        "inverse-surface": "#2f3130",
                        "surface-variant": "#e3e2e1",
                        "on-secondary-fixed": "#241a00",
                        "on-tertiary": "#ffffff",
                        "on-primary-container": "#ffffff",
                        "error-container": "#ffdad6",
                        "secondary-fixed": "#ffe089",
                        "on-primary-fixed-variant": "#8d0051",
                        "tertiary-fixed": "#ffd9e4",
                        "on-tertiary-container": "#ffffff",
                        "on-background": "#1a1c1c",
                        "primary-fixed": "#ffd9e4",
                        "on-error": "#ffffff",
                        "surface-container-highest": "#e3e2e1",
                        "secondary-fixed-dim": "#eac243",
                        "surface-bright": "#faf9f8",
                        "on-primary-fixed": "#3e0020",
                        "outline-variant": "#dfbec8",
                        "surface-container-lowest": "#ffffff",
                        "surface": "#faf9f8",
                        "secondary-container": "#fcd353",
                        "surface-tint": "#b5106b",
                        "on-error-container": "#93000a",
                        "background": "#faf9f8",
                        "tertiary": "#805062",
                        "primary-container": "#d63384",
                        "on-tertiary-fixed": "#330f1f",
                        "surface-container-low": "#f4f3f2",
                        "surface-container-high": "#e9e8e7",
                        "on-primary": "#ffffff",
                        "secondary": "#745b00",
                        "on-tertiary-fixed-variant": "#65394b",
                        "on-surface": "#1a1c1c",
                        "tertiary-fixed-dim": "#f2b6cb",
                        "inverse-on-surface": "#f1f0f0"
                    },
                    fontFamily: {
                        "headline": ["Noto Serif"],
                        "body": ["Manrope"],
                        "label": ["Manrope"]
                    },
                    borderRadius: { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" },
                },
            },
        }
    </script>
    <style>
        body {
            background-color: #FFECF0;
            /* Requested page background */
            font-family: 'Manrope', sans-serif;
            color: #1a1c1c;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }

        .editorial-text-wrap {
            shape-outside: circle(50%);
        }
    </style>
</head>

<body class="selection:bg-primary-fixed selection:text-on-primary-fixed">

    <!-- TopNavBar -->
    <nav class="fixed top-0 w-full z-50 bg-[#b5106a] backdrop-blur-xl">
        <div class="flex justify-between items-center px-8 py-4 max-w-screen-2xl mx-auto">
            <div class="flex items-center gap-8">
                <a class="flex items-center" href="#">
                    <img class="h-10 w-auto invert brightness-0" data-alt="Sib Style minimalist luxury beauty logo" src="{{ asset('sibs22.png') }}"/>
                    <span class="ml-4 text-2xl font-serif italic text-white tracking-tight"> Style Beauty Lounge</span>
                </a>
                <div class="hidden md:flex gap-10 absolute left-1/2 transform -translate-x-1/2">
                    <a class="text-white/90 font-medium hover:text-white transition-opacity duration-300" href="{{ route('homepage') }}">Home</a>
                    <a class="text-white/90 font-medium hover:text-white transition-opacity duration-300" href="{{ route('services') }}">Services</a>
                    <a class="text-white/90 font-medium hover:text-white transition-opacity duration-300" href="{{ route('about') }}">About</a>
                    <a class="text-white/90 font-medium hover:text-white transition-opacity duration-300" href="{{ route('contact') }}">Contact</a>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <a href="{{ route('login') }}" class="text-white font-label font-medium hover:opacity-80 transition-opacity">Login</a>
                
                <a href="{{ route('register') }}" class="bg-white text-[#b5106a] px-6 py-2 rounded-full font-label font-semibold text-sm hover:scale-95 transition-transform duration-200 inline-block">Register</a>
            </div>
        </div>
    </nav>

    <main class="pt-24">
        @if(session('success'))
            <div class="max-w-screen-2xl mx-auto px-8 mt-4">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif
        <!-- Hero Section -->
<section class="relative min-h-[921px] flex items-center px-8 md:px-24 overflow-hidden">
<div class="max-w-4xl z-10">
<span class="text-secondary font-label tracking-[0.3em] uppercase text-sm mb-6 block">The Curated Sanctuary</span>
<h1 class="font-headline text-6xl md:text-8xl text-on-surface leading-tight mb-8">
                    Relax, Unwind, Glow. <br/>
</h1>
<p class="text-on-surface-variant text-lg md:text-xl max-w-lg mb-12 font-light leading-relaxed">
                   At Sibs Style Beauty Lounge, we believe beauty starts with a moment of peace. Step into our curated sanctuary for a personalized experience that refreshes your look and restores your spirit. From signature styling to rejuvenating treatments, let us pamper you from head to toe.
                </p>
<div class="flex gap-6 items-center">
    <a href="{{ route('book') }}" class="bg-gradient-to-r from-primary to-primary-container text-white px-10 py-4 rounded-full font-label font-bold text-lg hover:shadow-2xl hover:shadow-primary/20 transition-all inline-block">
        Book an Appointment
    </a>
    
    <button class="text-on-surface font-label font-semibold flex items-center gap-2 group">
        View Lookbook 
        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
    </button>
</div>
</div>
<!-- Hero Visual Composition (Asymmetric) -->
<div class="absolute right-0 top-1/2 -translate-y-1/2 w-1/2 h-[80%] hidden lg:block">
<div class="relative w-full h-full">
<div class="absolute top-0 right-10 w-2/3 h-2/3 rounded-xl overflow-hidden  ">
<img class="w-full h-full object-cover" data-alt="High-end beauty salon interior minimalist" src="{{ asset('sibs1.png') }}"/>
</div>
<div class="absolute bottom-10 left-0 w-1/2 h-1/2 rounded-xl overflow-hidden shadow-2xl z-10 transform -rotate-3">
<img class="w-full h-full object-cover" data-alt="Close up of glowy skin and hair" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD5eMbIlDDj25jAGfAoe2FPfx0mb6nsgbNVSkipS9KpSfeCR1wU-DUjt4LM5CY0Cyrl_OTUGBZD4ZLhNLf2gcQYfEke-fNr6nINKRYBzRL5d4XQwXp1IOf38RSPA0y5q0LawcxeUrQr5ZvUXrtms78vQIWopfwzW1XfX7wcXPrugln5M36SwztXjdErDOGWxcBoydabHhO8fR5hn37yUmXdOf88BgIjya-2f6c4mkv04LhqOW32MagxwXBoywX2Ncy6iNkwrLdU9SY"/>
</div>
<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-32 h-32 bg-secondary rounded-full opacity-10 blur-3xl"></div>
</div>
</div>
</section>

        <!-- Services: Bento Grid Layout -->
        <section class="py-32 px-8 max-w-screen-2xl mx-auto" id="services">
            <div class="flex flex-col md:flex-row justify-between items-end mb-20 gap-8">
                <div>
                    <h2 class="font-headline text-5xl text-on-surface">The Services</h2>
                    <p class="font-body text-on-surface-variant mt-4 max-w-sm">Meticulously crafted treatments designed to restore balance and enhance your natural features.</p>
                </div>
                <div class="flex gap-4">
                    <span class="text-secondary font-headline italic text-4xl">01—03</span>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Service Card 1 -->
                <div class="group relative bg-white p-2 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-500 h-[500px]">
                    <div class="h-3/4 rounded-lg overflow-hidden relative">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" data-alt="Professional eyelash extensions application" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBAUaatBbDer6-E1joCcLg-IAteUP6t1UdpLutc1Xbj2prunMCYtImRUVvgjXZV9dSfsc_hKO62dckRnv02SK_rY41B3rbt2PciYesV6a2y5-yZ97lKCcC2dNi8I0fJqWRPB2u7_oQY1KQhC-3I8Lw7A9fxGo53Le7CXt4D-UGEBYFCN7hEeM87R_-KtGQZfHC-H_8iD3EGaLbE9Xv35McymnIfhXmbJxEZtYridXM8MOX0k5LQcyvDui3463F_xTVgyQY7e7jd5BI" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-headline text-2xl text-on-surface">Artisan Lashes</h3>
                            <span class="text-secondary font-label font-bold">$120+</span>
                        </div>
                        <p class="text-on-surface-variant text-sm font-body">Custom volume and classic sets.</p>
                    </div>
                </div>

                <!-- Service Card 2 (Offset/Tall) -->
                <div class="group relative bg-white p-2 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-500 h-[560px] md:-mt-12">
                    <div class="h-[82%] rounded-lg overflow-hidden relative">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" data-alt="Minimalist nail art design" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDuYHRJALgiL0RLTaQqgS1Dyhfg0FwsrnMC4O8CRvkxbAkDhnOKxHc_j0mGK4GAuxZ24pocdSjixjsTFRyNHNJv_R16iA-CQumnXNPmeCc6YAa2Mvh_0ygcitaVuQ8I5Kswxdo7Ngncefbk-IAgnZdLxrt_LWjGZz3f46cAcKvCrpimJEgzdW5hFK99S2ZsWi3WQkiYdtM9nfTXB2MeQabtGTAKyItwydj97_sZd1Ac_mUGulYyBrT3eq0xWOVI4wQDSNhREIGkvAk" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-headline text-2xl text-on-surface">Couture Nails</h3>
                            <span class="text-secondary font-label font-bold">$85+</span>
                        </div>
                        <p class="text-on-surface-variant text-sm font-body">Editorial aesthetics and care.</p>
                    </div>
                </div>

                <!-- Service Card 3 -->
                <div class="group relative bg-white p-2 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-500 h-[500px]">
                    <div class="h-3/4 rounded-lg overflow-hidden relative">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" data-alt="Rejuvenating facial therapy session" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCziUI9bAxj1i82T9eped-pdaOTn_LJRXOXEcml_JME-svyrP-v6VQ1ct5-u2e0Fc2cbI6VYoWJfED3-FLmwT5Tv1JQpT0tSHfB-ZruDK5X5apa1BjBgT9bBob7d15-XYiObyhesf0WXkd26u00IVH5rlean-HOk8ALvn0uSHmxZW7LOa-cnISGtIYTnoH7A3KUnfZOZnrQYOO4ZMlsV1B-x29oXzdmQElHVZdEkLfsKsNu6kQfSsl1E2RDetDLItun-alCmrmhvOU" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-headline text-2xl text-on-surface">The Ritual Facial</h3>
                            <span class="text-secondary font-label font-bold">$150+</span>
                        </div>
                        <p class="text-on-surface-variant text-sm font-body">Science-backed dermal therapy.</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- Aesthetic Statement -->
        <section class="py-20 bg-surface-container-low/50">
            <div class="max-w-4xl mx-auto text-center px-8">
                <span class="material-symbols-outlined text-secondary text-5xl mb-8" style="font-variation-settings: 'FILL' 1;">spa</span>
                <h2 class="font-headline text-4xl md:text-5xl italic text-on-surface leading-tight">
                    "True beauty is not just a destination, but a curated state of being. We provide the sanctuary; you provide the soul."
                </h2>
                <div class="mt-8 flex justify-center items-center gap-4">
                    <div class="h-px w-12 bg-outline-variant"></div>
                    <span class="font-label uppercase tracking-widest text-xs text-on-surface-variant">Sib Style Philosophy</span>
                    <div class="h-px w-12 bg-outline-variant"></div>
                </div>
            </div>
        </section>

        <!-- Gallery: Editorial Layout -->
        <section class="py-32 px-8 max-w-screen-2xl mx-auto" id="gallery">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <div class="lg:col-span-2 flex flex-col justify-center pr-12">
                    <h2 class="font-headline text-6xl text-on-surface mb-8">Visual <br /> Essence</h2>
                    <p class="font-body text-on-surface-variant mb-12">Browse our latest creations and sanctuary transformations. Every frame is a testament to our commitment to aesthetic excellence.</p>
                    <button class="self-start text-primary font-label font-bold uppercase tracking-tighter border-b-2 border-primary pb-1">View Full Portfolio</button>
                </div>
                <div class="lg:col-span-1 space-y-8">
                    <img class="w-full aspect-square object-cover rounded-xl grayscale hover:grayscale-0 transition-all duration-700" data-alt="Aesthetic beauty products layout" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAVFuibStSbmf3u10suZrkk79WTWLvU80GU6fmSIqfyD_u0E0p1aNLhUydHCL4CBOaiNRe8e3SF-u0_4uM5XWPzx5JubXjHM9Mbizq0Dv_MpDtw2-Mmh424I_j_72cjGaWSoEY1nMw-xCga_GVlY-xsCAFmSJxokVZ1fdKM_UH01WDbue3N3jh5WalHJkBcdQEhyBBNHSXzS0BOWXIdwtS_cRILtRbrbFALyKMoexd-9jhT-WJSo2iQMNX8FtaYPQ2hLqKuNWkqbpU" />
                    <img class="w-full aspect-[3/4] object-cover rounded-xl shadow-lg" data-alt="Model with elegant makeup and jewelry" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBULu3O8gSpGYVzZ3escEYFR3NDcjJHAHqNGSIhDkBEtPILn5fDHymK-PC7PKuf4cyys0OH83lAf6S7a_fSxo0WwX2SKpKzW2O13arbk9s1vgEC_Iv5erzsdmwJp2TRN0A6skpTNYXGX0qxyaMOpMfIlAWuLim9gO-fi3h_c-9n5o995bzXrpbaw7sgB7MY8zZjAJzLSg42nkENIEvzkinA-hiXcKVm25nvoDfPKyFu_IlyyWHCrmc2cTTnororxOK1AyKhwa3p8GI" />
                </div>
                <div class="lg:col-span-1 pt-24">
                    <img class="w-full aspect-[2/3] object-cover rounded-xl shadow-lg" data-alt="Soft aesthetic salon treatment room" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB485b4C6_uGFb1qFIvskCQArc3VusEAhgycqWpA84x86ej9qry9SV_EA2UzJyscj0vMFdaTWeyRIMKRa6uEN2odxvBPi2DlRq7XzZsdRCde6eET0H_Wm34X256ukZLJyCaABzEj1inCZTVvSkDu0VTu4h6FZ0uR1FdBaXP0CV5tYyCV9PkZnD7GCScQEExkNafLyNtUI3OR0U9VPvI-GuulGBySzqmL35Ad__mHoIKNeJz752vMB49Drugor5YVwK6PcPL-ei4j_0" />
                </div>
            </div>
        </section>

        <!-- Newsletter / Contact CTA -->
        <section class="py-32 px-8 max-w-4xl mx-auto text-center" id="contact">
            <div class="bg-white rounded-3xl p-16 shadow-sm">
                <h2 class="font-headline text-4xl text-on-surface mb-4">Join the Collective</h2>
                <p class="font-body text-on-surface-variant mb-10">Receive exclusive access to seasonal rituals and priority booking.</p>
                <form class="flex flex-col md:flex-row gap-4 max-w-md mx-auto">
                    <input class="flex-grow bg-surface-container-low border-none rounded-full px-8 py-4 focus:ring-2 focus:ring-primary/20 font-body outline-none" placeholder="Email Address" type="email" />
                    <button class="bg-primary text-white px-8 py-4 rounded-full font-label font-bold text-xs uppercase tracking-widest hover:opacity-90 transition-opacity">Subscribe</button>
                </form>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-[#f4f3f2] pt-20 pb-10">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 px-12 max-w-7xl mx-auto">
            <div class="col-span-1">
                <h2 class="text-xl font-serif text-[#b5106a] mb-6">Sib Style</h2>
                <p class="text-stone-500 font-body text-sm leading-relaxed">
                    The Curated Sanctuary for those who value the intersection of wellness and high-aesthetic.
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

    </body>
</html>