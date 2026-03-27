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
        <div onclick="openModal('nail-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl bg-surface-container shadow-sm">
            <img src="https://images.unsplash.com/photo-1604654894610-df63bc536371?q=80&w=800&auto=format&fit=crop" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-8">
                <h3 class="font-headline text-3xl text-white">Nail Care</h3>
                <p class="text-white/70 text-sm mt-2 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">View Menu</p>
            </div>
        </div>

        <!-- EYELASH -->
        <div onclick="openModal('eyelash-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl bg-surface-container shadow-sm">
            <img src="https://images.unsplash.com/photo-1583001931046-f9e4313b85ce?q=80&w=800&auto=format&fit=crop" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-8">
                <h3 class="font-headline text-3xl text-white">Eyelashing</h3>
                <p class="text-white/70 text-sm mt-2 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">View Menu</p>
            </div>
        </div>

        <!-- FACIAL -->
        <div onclick="openModal('facial-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl bg-surface-container shadow-sm">
            <img src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?q=80&w=800&auto=format&fit=crop" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-8">
                <h3 class="font-headline text-3xl text-white">Facial & Threading</h3>
                <p class="text-white/70 text-sm mt-2 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">View Menu</p>
            </div>
        </div>

        <!-- HAIR -->
        <div onclick="openModal('hair-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl bg-surface-container shadow-sm">
            <img src="https://images.unsplash.com/photo-1560869713-7d0a29430803?q=80&w=800&auto=format&fit=crop" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-8">
                <h3 class="font-headline text-3xl text-white">Hair Services</h3>
                <p class="text-white/70 text-sm mt-2 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">View Menu</p>
            </div>
        </div>

        <!-- WAXING -->
        <div onclick="openModal('waxing-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl bg-surface-container shadow-sm">
            <img src="https://images.unsplash.com/photo-1596178065887-1198b6148b2b?q=80&w=800&auto=format&fit=crop" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-8">
                <h3 class="font-headline text-3xl text-white">Waxing</h3>
                <p class="text-white/70 text-sm mt-2 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">View Menu</p>
            </div>
        </div>

        <!-- MASSAGE -->
        <div onclick="openModal('massage-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl bg-surface-container shadow-sm">
            <img src="https://images.unsplash.com/photo-1544161515-4af6b1d462c2?q=80&w=800&auto=format&fit=crop" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-8">
                <h3 class="font-headline text-3xl text-white">Relaxing Massage</h3>
                <p class="text-white/70 text-sm mt-2 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">View Menu</p>
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