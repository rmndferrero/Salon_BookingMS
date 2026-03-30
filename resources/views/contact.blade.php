@extends('layouts.app')

@section('content')

<!-- MAIN -->
<main class="pt-32 pb-20">

    <!-- Hero Section -->
    <section class="max-w-7xl mx-auto px-8 mb-24 text-center md:text-left">
        <h1 class="text-5xl md:text-7xl font-serif italic text-primary leading-tight mb-6">
            Contact Us.
        </h1>
        <p class="max-w-xl text-on-surface-variant font-body text-lg leading-relaxed opacity-80">
            Whether you seek a momentary escape or a complete transformation, our digital concierge is here to curate your perfect visit to Sib Style.
        </p>
    </section>

    <!-- Contact Grid & Interior Image -->
    <section class="max-w-7xl mx-auto px-8 mb-32">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

            <!-- Left Column: Contact Methods -->
            <div class="lg:col-span-4 space-y-12">

                <div class="group flex items-start gap-6">
                    <div class="w-14 h-14 rounded-full border border-outline-variant/30 flex items-center justify-center text-secondary group-hover:bg-secondary group-hover:text-white transition-all duration-500">
                        <span class="material-symbols-outlined" data-icon="location_on">location_on</span>
                    </div>
                    <div>
                        <h3 class="font-serif text-xl mb-2">Location</h3>
                        <p class="text-on-surface-variant leading-relaxed">
                            Al Hashar Building-Salah<br/>
                            Al Din St-Office no 301-Main Road-Next to<br/>
                            Crown Plaza Hotel-Muteena- Deira, Dubai, United Arab Emirates, 0000
                        </p>
                    </div>
                </div>

                <div class="group flex items-start gap-6">
                    <div class="w-14 h-14 rounded-full border border-outline-variant/30 flex items-center justify-center text-secondary group-hover:bg-secondary group-hover:text-white transition-all duration-500">
                        <span class="material-symbols-outlined" data-icon="calendar_month">calendar_month</span>
                    </div>
                    <div>
                        <h3 class="font-serif text-xl mb-2">Reservations</h3>
                        <p class="text-on-surface-variant leading-relaxed">
                            +971 52 906 3016<br/>
                            mcjalandoni@yahoo.com
                        </p>
                    </div>
                </div>

                <div class="group flex items-start gap-6">
                    <div class="w-14 h-14 rounded-full border border-outline-variant/30 flex items-center justify-center text-secondary group-hover:bg-secondary group-hover:text-white transition-all duration-500">
                        <span class="material-symbols-outlined" data-icon="chat_bubble">chat_bubble</span>
                    </div>
                    <div>
                        <h3 class="font-serif text-xl mb-2">Digital Concierge</h3>
                        <p class="text-on-surface-variant leading-relaxed">
                            WhatsApp Support Available<br/>
                            Mon - Sat, 9am to 6pm
                        </p>
                    </div>
                </div>

            </div>

            <!-- Center Column: Interior Visual -->
            <div class="lg:col-span-5 h-[500px] relative overflow-hidden rounded-xl">
                <img
                    alt="Salon Interior"
                    class="w-full h-full object-cover transition-all duration-1000"
                    data-alt="Luxurious minimalist beauty salon interior with soft cream walls, arched mirrors, and velvet chairs in warm golden light"
                    src="{{ asset('lounge.jpg') }}"
                />
            </div>

            <!-- Right Column: Salon Hours -->
            <div class="lg:col-span-3">

                <div class="bg-surface-container-low/50 glass-effect p-8 rounded-xl border border-outline-variant/10">
                    <h3 class="font-serif text-2xl mb-8 border-b border-outline-variant/20 pb-4">Salon Hours</h3>
                    <ul class="space-y-4 font-body text-sm tracking-wide">
                        <li class="flex justify-between">
                            <span>Monday-Thursday</span>
                            <span>10:00am — 9:00pm</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Friday-Sunday</span>
                            <span>10:00am — 10:00pm</span>
                        </li>
                    </ul>
                </div>

                <!-- Arrival Guide Section -->
                <div class="mt-8 p-6 bg-secondary-fixed/30 rounded-xl border-l-4 border-secondary">
                    <h4 class="font-serif italic text-on-secondary-fixed mb-2">A Note for Your First Visit</h4>
                    <p class="text-xs text-on-secondary-fixed-variant leading-relaxed">
                        (Insert Details)
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- FAQ and Map Two-Column Section -->
    <section class="max-w-7xl mx-auto px-8 mb-32">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

            <!-- Left Column: Common Inquiries (FAQ) -->
            <div>
                <div class="mb-12">
                    <span class="text-secondary uppercase tracking-[0.3em] text-xs font-bold">Curated Guidance</span>
                    <h2 class="text-4xl font-serif mt-4">Common Inquiries</h2>
                </div>

                <div class="space-y-4">

                    <details class="group bg-surface-container-lowest rounded-xl border border-transparent hover:border-outline-variant/20 transition-all duration-300">
                        <summary class="flex justify-between items-center p-6 cursor-pointer list-none">
                            <span class="font-serif text-lg">What is your cancellation policy?</span>
                            <span class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180" data-icon="expand_more">expand_more</span>
                        </summary>
                        <div class="px-6 pb-6 text-on-surface-variant leading-relaxed">
                            We require 48 hours notice for all cancellations. Appointments cancelled within this window will incur a 50% service fee to respect our specialists' time.
                        </div>
                    </details>

                    <details class="group bg-surface-container-lowest rounded-xl border border-transparent hover:border-outline-variant/20 transition-all duration-300">
                        <summary class="flex justify-between items-center p-6 cursor-pointer list-none">
                            <span class="font-serif text-lg">Do you offer valet parking?</span>
                            <span class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180" data-icon="expand_more">expand_more</span>
                        </summary>
                        <div class="px-6 pb-6 text-on-surface-variant leading-relaxed">
                            Yes, complementary valet parking is provided for all Sib Style guests. Simply pull up to the main entrance under the ivory awning.
                        </div>
                    </details>

                    <details class="group bg-surface-container-lowest rounded-xl border border-transparent hover:border-outline-variant/20 transition-all duration-300">
                        <summary class="flex justify-between items-center p-6 cursor-pointer list-none">
                            <span class="font-serif text-lg">Can I book group experiences?</span>
                            <span class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180" data-icon="expand_more">expand_more</span>
                        </summary>
                        <div class="px-6 pb-6 text-on-surface-variant leading-relaxed">
                            Absolutely. We specialize in curated wedding and corporate spa days. Please contact our Digital Concierge for custom group packages.
                        </div>
                    </details>

                </div>
            </div>

            <!-- Right Column: Map Section -->
            <div class="relative h-[600px] bg-[#f4f3f2] overflow-hidden rounded-2xl border border-outline-variant/10">

                <iframe
                    allowfullscreen=""
                    class="absolute inset-0 w-full h-full grayscale-[0.4] opacity-80 border-0"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.5!2d55.3264!3d25.2697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5c648bef0c51%3A0x0!2sSalah+Al+Din+St%2C+Muteena%2C+Deira%2C+Dubai%2C+UAE!5e0!3m2!1sen!2sae!4v1715600000000!5m2!1sen!2sae"
                ></iframe>

                <!-- Floating Contact Card -->
                <div class="absolute inset-0 flex items-center justify-center p-6">
                    <div class="bg-white/95 p-8 rounded-2xl shadow-xl max-w-sm border border-outline-variant/20 backdrop-blur-md">
                        <h3 class="font-serif text-2xl mb-4 text-primary">The Sanctuary Location</h3>
                        <p class="text-on-surface-variant text-sm mb-6 leading-relaxed">
                            Situated in the heart of the historic district, our lounge is a quiet retreat from the bustling city rhythm.
                        </p>
                        <div class="space-y-3 mb-8">
                            <button
                                class="w-full bg-primary text-on-primary py-4 rounded-full font-label tracking-widest uppercase text-xs hover:opacity-90 transition-opacity flex items-center justify-center gap-2"
                                onclick="window.open('https://www.google.com/maps/dir/?api=1&destination=Al+Hashar+Building+Salah+Al+Din+St+Muteena+Deira+Dubai+UAE', '_blank')"
                            >
                                <span class="material-symbols-outlined text-lg" data-icon="near_me">near_me</span>
                                Get Directions
                            </button>
                            <button
                                class="w-full bg-primary text-on-primary py-4 rounded-full font-label tracking-widest uppercase text-xs hover:opacity-90 transition-opacity flex items-center justify-center gap-2"
                                onclick="window.open('https://www.google.com/maps/search/?api=1&query=Al+Hashar+Building+Salah+Al+Din+St+Muteena+Deira+Dubai+UAE', '_blank')"
                            >
                                <span class="material-symbols-outlined text-lg" data-icon="map">map</span>
                                Open in Google Maps
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

</main>

@endsection