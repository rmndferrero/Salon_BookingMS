@extends('layouts.app')

@section('content')

<main class="pt-32 pb-20 px-8 max-w-screen-2xl mx-auto">

    <!-- HEADER -->
    <div class="text-center max-w-3xl mx-auto mb-20">
        <span class="text-primary font-bold tracking-[0.3em] uppercase text-xs mb-4 block">
            The Selection
        </span>

        <h1 class="font-headline text-5xl md:text-6xl mb-6">
            Our Specialized Care
        </h1>

        <p class="text-on-surface-variant font-light text-lg">
            Discover a curated collection of beauty treatments designed to rejuvenate your spirit and enhance your natural glow.
        </p>
    </div>

    <!-- SERVICES GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <!-- NAIL -->
        <div onclick="openModal('nail-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl shadow-sm">
    <img 
        src="{{ asset('Nails_Services.jpg') }}" 
        class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
    >
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
        <h3 class="font-headline text-3xl text-white mb-2">Nail Care</h3>

        <!-- Persistent frosted pill — always visible -->
        <div class="flex items-center gap-2 w-fit
                    bg-white/20 backdrop-blur-md
                    border border-white/35
                    text-white text-sm font-medium
                    px-4 py-1.5 rounded-full
                    transition-all duration-300
                    group-hover:bg-white/35 group-hover:border-white/50">
            <span>View services</span>
            <span class="text-xs transition-transform duration-300 group-hover:translate-x-0.5">→</span>
        </div>
    </div>
</div>

<!-- EYELASH -->
<div onclick="openModal('eyelash-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl bg-surface-container shadow-sm">
    <img src="{{ asset('Eyelashing_Services.jpg') }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
        <h3 class="font-headline text-3xl text-white mb-2">Eyelashing</h3>
        <div class="flex items-center gap-2 w-fit bg-white/20 backdrop-blur-md border border-white/35 text-white text-sm font-medium px-4 py-1.5 rounded-full transition-all duration-300 group-hover:bg-white/35 group-hover:border-white/50">
            <span>View services</span>
            <span class="text-xs transition-transform duration-300 group-hover:translate-x-0.5">→</span>
        </div>
    </div>
</div>

<!-- FACIAL -->
<div onclick="openModal('facial-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl bg-surface-container shadow-sm">
    <img src="{{ asset('Facial_Services.jpg') }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
        <h3 class="font-headline text-3xl text-white mb-2">Facial & Threading</h3>
        <div class="flex items-center gap-2 w-fit bg-white/20 backdrop-blur-md border border-white/35 text-white text-sm font-medium px-4 py-1.5 rounded-full transition-all duration-300 group-hover:bg-white/35 group-hover:border-white/50">
            <span>View services</span>
            <span class="text-xs transition-transform duration-300 group-hover:translate-x-0.5">→</span>
        </div>
    </div>
</div>

<!-- HAIR -->
<div onclick="openModal('hair-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl bg-surface-container shadow-sm">
    <img src="{{ asset('Hair_Services.jpg') }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
        <h3 class="font-headline text-3xl text-white mb-2">Hair Services</h3>
        <div class="flex items-center gap-2 w-fit bg-white/20 backdrop-blur-md border border-white/35 text-white text-sm font-medium px-4 py-1.5 rounded-full transition-all duration-300 group-hover:bg-white/35 group-hover:border-white/50">
            <span>View services</span>
            <span class="text-xs transition-transform duration-300 group-hover:translate-x-0.5">→</span>
        </div>
    </div>
</div>

<!-- WAXING -->
<div onclick="openModal('waxing-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl bg-surface-container shadow-sm">
    <img src="{{ asset('Waxing_Services1.jpg') }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
        <h3 class="font-headline text-3xl text-white mb-2">Waxing</h3>
        <div class="flex items-center gap-2 w-fit bg-white/20 backdrop-blur-md border border-white/35 text-white text-sm font-medium px-4 py-1.5 rounded-full transition-all duration-300 group-hover:bg-white/35 group-hover:border-white/50">
            <span>View services</span>
            <span class="text-xs transition-transform duration-300 group-hover:translate-x-0.5">→</span>
        </div>
    </div>
</div>

<!-- MASSAGE -->
<div onclick="openModal('massage-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl bg-surface-container shadow-sm">
    <img src="{{ asset('Massage_Services.jpg') }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
        <h3 class="font-headline text-3xl text-white mb-2">Relaxing Massage</h3>
        <div class="flex items-center gap-2 w-fit bg-white/20 backdrop-blur-md border border-white/35 text-white text-sm font-medium px-4 py-1.5 rounded-full transition-all duration-300 group-hover:bg-white/35 group-hover:border-white/50">
            <span>View services</span>
            <span class="text-xs transition-transform duration-300 group-hover:translate-x-0.5">→</span>
        </div>
    </div>
</div>
    {{-- MODALS SECTION --}}
    
    @php
        $menus = [
            ['id' => 'nail-modal', 'partial' => 'partials.nail-menu'],
            ['id' => 'eyelash-modal', 'partial' => 'partials.eyelash-menu'],
            ['id' => 'facial-modal', 'partial' => 'partials.facial-menu'],
            ['id' => 'hair-modal', 'partial' => 'partials.hair-menu'],
            ['id' => 'waxing-modal', 'partial' => 'partials.waxing-menu'],
            ['id' => 'massage-modal', 'partial' => 'partials.massage-menu'],
        ];
    @endphp

    @foreach($menus as $menu)
    <div id="{{ $menu['id'] }}" class="hidden fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4" onclick="closeModal('{{ $menu['id'] }}')">
        <div class="bg-white rounded-[2rem] max-w-4xl w-full max-h-[90vh] overflow-y-auto relative shadow-2xl" onclick="event.stopPropagation()">
            <button onclick="closeModal('{{ $menu['id'] }}')" class="absolute top-6 right-8 text-4xl text-gray-400 hover:text-primary transition-colors">&times;</button>
            <div class="p-4">
                @include($menu['partial'])
            </div>
        </div>
    </div>
    @endforeach

</main>

<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Stop background scrolling
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
        document.body.style.overflow = 'auto'; // Re-enable scrolling
    }
</script>

@endsection