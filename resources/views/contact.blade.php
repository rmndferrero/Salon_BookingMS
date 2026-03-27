@extends('layouts.app')

@section('content')

<!-- MAIN -->
<main class="pt-32 pb-24 px-6 md:px-12 lg:px-24 max-w-5xl mx-auto">

    <!-- HERO -->
    <header class="mb-20 text-center">
        <h1 class="font-headline text-5xl md:text-7xl text-primary mb-6 tracking-tight leading-tight italic">
            Connect with <br /> the Sanctuary
        </h1>

        <p class="font-body text-on-surface-variant text-lg max-w-2xl mx-auto leading-relaxed opacity-80">
            Experience a new standard of beauty curation. Our concierge team is ready to tailor your next visit to your unique aesthetic journey.
        </p>
    </header>

    <!-- GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-16 items-start">

        <!-- LEFT -->
        <div class="space-y-12">

            <!-- CONTACT DETAILS -->
            <section>
                <h3 class="font-headline text-3xl text-secondary mb-8 border-b border-secondary/10 pb-4">
                    Contact Details
                </h3>

                <div class="space-y-8">

                    <div class="flex items-start gap-6">
                        <span class="material-symbols-outlined text-secondary pt-1">location_on</span>
                        <div>
                            <h4 class="text-xs uppercase mb-2">Location</h4>
                            <address class="not-italic text-xl">
                                455 North Canon Drive,<br />
                                Beverly Hills, CA 90210
                            </address>
                        </div>
                    </div>

                    <div class="flex items-start gap-6">
                        <span class="material-symbols-outlined text-secondary pt-1">call</span>
                        <div>
                            <h4 class="text-xs uppercase mb-2">Reservations</h4>
                            <p class="text-xl">+1 (310) 555-0198</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-6">
                        <span class="material-symbols-outlined text-secondary pt-1">mail</span>
                        <div>
                            <h4 class="text-xs uppercase mb-2">Digital Concierge</h4>
                            <p class="text-xl">concierge@sibstyle.com</p>
                        </div>
                    </div>

                </div>
            </section>

            <!-- HOURS -->
            <section class="bg-white/40 backdrop-blur-sm p-8 rounded-xl shadow-sm border border-white/20">
                <h3 class="text-2xl text-secondary mb-6 italic">Salon Hours</h3>

                <div class="space-y-4">

                    <div class="flex justify-between border-b pb-2">
                        <span class="text-sm uppercase">Monday — Friday</span>
                        <span class="font-semibold">9:00 AM — 8:00 PM</span>
                    </div>

                    <div class="flex justify-between border-b pb-2">
                        <span class="text-sm uppercase">Saturday</span>
                        <span class="font-semibold">10:00 AM — 6:00 PM</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-sm uppercase">Sunday</span>
                        <span class="italic text-secondary">By Appointment Only</span>
                    </div>

                </div>
            </section>

        </div>

        <!-- RIGHT -->
        <div class="h-full flex flex-col justify-center">

            <div class="aspect-[3/4] rounded-xl overflow-hidden shadow-2xl border border-white/30">
                <img class="w-full h-full object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/..." />
            </div>

            <p class="mt-6 text-center italic text-primary/60 text-sm">
                Refined elegance at every corner.
            </p>

        </div>

    </div>

</main>

<!-- MAP SECTION -->
<section class="relative bg-[#FFECF0] py-24 md:py-48 px-8 overflow-hidden">

    <div class="max-w-[1440px] mx-auto relative h-[800px]">

        <!-- MAP -->
        <div class="absolute inset-0 md:inset-x-20 bg-white shadow-2xl rounded-sm overflow-hidden">

            <iframe class="w-full h-full border-0"></iframe>

            <div class="absolute inset-0 pointer-events-none border-[32px] border-white/10"></div>

        </div>

        <!-- FLOATING CARD -->
        <div class="absolute top-1/2 left-4 md:left-0 -translate-y-1/2 z-20 w-full max-w-lg">

            <div class="bg-white p-12 md:p-16 shadow-2xl border-l-[12px] border-primary">

                <div class="space-y-10">

                    <div>
                        <span class="text-primary uppercase text-[10px] block">Arrival</span>
                        <h2 class="text-5xl italic">Visit the <br /> Sanctuary.</h2>
                    </div>

                    <div class="space-y-8">

                        <div>
                            <h5 class="italic text-xl text-primary">Beverly Hills</h5>
                            <address>
                                455 North Canon Drive<br />
                                Beverly Hills, CA 90210
                            </address>
                        </div>

                        <div class="grid gap-4 pt-4 border-t">
                            <div class="flex gap-4">
                                <span class="material-symbols-outlined text-primary">call</span>
                                <span>+1 (310) 555-0198</span>
                            </div>

                            <div class="flex gap-4">
                                <span class="material-symbols-outlined text-primary">mail</span>
                                <span>concierge@sibstyle.com</span>
                            </div>
                        </div>

                    </div>

                    <button class="w-full bg-[#b5106a] text-white py-5">
                        Book Your Session
                    </button>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection