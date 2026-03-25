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
                <button class="text-white font-label font-medium hover:opacity-80 transition-opacity">Login</button>
                <button class="bg-white text-[#b5106a] px-6 py-2 rounded-full font-label font-semibold text-sm hover:scale-95 transition-transform duration-200">Register</button>
            </div>
        </div>
    </nav>
    <main class="pt-32 pb-24 px-6 md:px-12 lg:px-24 max-w-5xl mx-auto">
<!-- Hero Section -->
<header class="mb-20 text-center">
<h1 class="font-headline text-5xl md:text-7xl text-primary mb-6 tracking-tight leading-tight italic">
            Connect with <br/> the Sanctuary
        </h1>
<p class="font-body text-on-surface-variant text-lg max-w-2xl mx-auto leading-relaxed opacity-80">
            Experience a new standard of beauty curation. Our concierge team is ready to tailor your next visit to your unique aesthetic journey.
        </p>
</header>
<!-- Restructured Content Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-16 items-start">
<!-- Left: Contact Details & Hours -->
<div class="space-y-12">
<!-- Direct Contact Information -->
<section>
<h3 class="font-headline text-3xl text-secondary mb-8 border-b border-secondary/10 pb-4">Contact Details</h3>
<div class="space-y-8">
<div class="flex items-start gap-6 group">
<span class="material-symbols-outlined text-secondary pt-1">location_on</span>
<div>
<h4 class="font-label text-xs uppercase tracking-widest text-on-surface-variant mb-2">Location</h4>
<address class="not-italic font-headline text-xl text-on-surface leading-snug">
                                455 North Canon Drive,<br/>Beverly Hills, CA 90210
                            </address>
</div>
</div>
<div class="flex items-start gap-6 group">
<span class="material-symbols-outlined text-secondary pt-1">call</span>
<div>
<h4 class="font-label text-xs uppercase tracking-widest text-on-surface-variant mb-2">Reservations</h4>
<p class="font-headline text-xl text-on-surface leading-snug">+1 (310) 555-0198</p>
</div>
</div>
<div class="flex items-start gap-6 group">
<span class="material-symbols-outlined text-secondary pt-1">mail</span>
<div>
<h4 class="font-label text-xs uppercase tracking-widest text-on-surface-variant mb-2">Digital Concierge</h4>
<p class="font-headline text-xl text-on-surface leading-snug">concierge@sibstyle.com</p>
</div>
</div>
</div>
</section>
<!-- Hours of Operation -->
<section class="bg-white/40 backdrop-blur-sm p-8 rounded-xl shadow-sm border border-white/20">
<h3 class="font-headline text-2xl text-secondary mb-6 italic">Salon Hours</h3>
<div class="space-y-4">
<div class="flex justify-between items-center border-b border-outline-variant/20 pb-2">
<span class="font-label text-sm uppercase tracking-wider text-on-surface-variant">Monday — Friday</span>
<span class="font-body font-semibold text-on-surface">9:00 AM — 8:00 PM</span>
</div>
<div class="flex justify-between items-center border-b border-outline-variant/20 pb-2">
<span class="font-label text-sm uppercase tracking-wider text-on-surface-variant">Saturday</span>
<span class="font-body font-semibold text-on-surface">10:00 AM — 6:00 PM</span>
</div>
<div class="flex justify-between items-center pb-2">
<span class="font-label text-sm uppercase tracking-wider text-on-surface-variant">Sunday</span>
<span class="font-body italic text-secondary font-medium">By Appointment Only</span>
</div>
</div>
</section>
</div>
<!-- Right: Aesthetic Imagery -->
<div class="h-full flex flex-col justify-center">
<div class="aspect-[3/4] rounded-xl overflow-hidden shadow-2xl shadow-primary/10 border border-white/30">
<img alt="Luxury Salon Interior" class="w-full h-full object-cover" data-alt="A minimalist high-end beauty salon interior with soft cream walls, gold accents, marble textures, and soft warm lighting for an editorial feel" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDYlpB3saanfRyLMW00wShahLPDOViOz6AGM5HxrlYYdiCwZOATS3s3kF22-JYHMamGtBhUgu2U61K_43CgrA6bhoWyDjk61GSuPF2v0gd0HkFRk8IPqeRDJJk73PA-zf0xXtczatnz2ztLNFk2vO1W6FbncyjF82YLeS2FiPV8iDDJEM-IZC_BVjN8JBp2wrawNgDjBRKjWFHtHw8eZbLFPQbiY1eBPaFJrnoULIXpJ6MwnCQxGWrjvbmMzR6DbxrQzcwkA8tl_4o"/>
</div>
<p class="mt-6 text-center font-serif italic text-primary/60 text-sm tracking-wide">Refined elegance at every corner.</p>
</div>
</div>
</main>

<!-- Visit the Sanctuary: Redesigned Map Section -->
<section class="relative bg-[#FFECF0] py-24 md:py-48 px-8 overflow-hidden">
<div class="max-w-[1440px] mx-auto relative h-[800px]">
<!-- Framed Map -->
<div class="absolute inset-0 md:inset-x-20 md:inset-y-0 bg-white shadow-2xl overflow-hidden rounded-sm">
<div class="w-full h-full map-container">
<iframe allowfullscreen="" class="w-full h-full border-0 grayscale saturate-50 contrast-125" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3304.45330331047!2d-118.40242562344795!3d34.07073281675276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bc07545ca871%3A0x6a2c5108040a45e9!2s455%20N%20Canon%20Dr%2C%20Beverly%20Hills%2C%20CA%2090210!5e0!3m2!1sen!2sus!4v1715600000000!5m2!1sen!2sus&amp;iwloc=near&amp;hl=en" style="filter: hue-rotate(-20deg) brightness(1.1) contrast(0.85);">
</iframe>
</div>
<!-- Subtle Overlays to mute UI -->
<div class="absolute inset-0 pointer-events-none border-[32px] border-white/10"></div>
</div>
<!-- Floating Contact Card -->
<div class="absolute top-1/2 left-4 md:left-0 -translate-y-1/2 z-20 w-full max-w-lg">
<div class="bg-white p-12 md:p-16 shadow-2xl border-l-[12px] border-primary">
<div class="space-y-10">
<div class="space-y-4">
<span class="text-primary font-label tracking-[0.5em] uppercase text-[10px] font-bold block">Arrival</span>
<h2 class="text-5xl md:text-6xl font-serif italic text-on-surface leading-[1.1]">Visit the <br/> Sanctuary.</h2>
</div>
<div class="space-y-8">
<div class="space-y-2">
<h5 class="font-serif italic text-xl text-primary">Beverly Hills</h5>
<address class="not-italic text-on-surface-variant leading-relaxed text-lg font-body font-light">
                                        455 North Canon Drive<br/>
                                        Beverly Hills, CA 90210
                                    </address>
</div>
<div class="grid grid-cols-1 gap-4 pt-4 border-t border-primary/10">
<div class="flex items-center gap-4 group">
<span class="material-symbols-outlined text-primary text-xl">call</span>
<span class="font-body text-sm font-medium tracking-wider text-on-surface">+1 (310) 555-0198</span>
</div>
<div class="flex items-center gap-4 group">
<span class="material-symbols-outlined text-primary text-xl">mail</span>
<span class="font-body text-sm font-medium tracking-wider text-on-surface">concierge@sibstyle.com</span>
</div>
</div>
</div>
<button class="w-full bg-[#b5106a] text-white px-8 py-5 text-sm font-bold uppercase tracking-[0.3em] hover:bg-black transition-all shadow-lg active:scale-95">
                                Book Your Session
                            </button>
</div>
</div>
</div>

</div>
</div>
<!-- Stylized Text Elements -->
<div class="absolute top-12 right-12 z-10 hidden xl:block">
<span class="vertical-text text-on-surface/5 font-serif italic text-9xl leading-none select-none">BEVERLY HILLS</span>
</div>
</div>
</section>
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