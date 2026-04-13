@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    .servicesSwiper {
        width: 100%;
        padding-top: 20px;
        padding-bottom: 80px;
    }
    
    .swiper-button-next, .swiper-button-prev {
        color: #b5106a !important;
        background: rgba(255, 255, 255, 0.9);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .swiper-button-next:after, .swiper-button-prev:after {
        font-size: 20px;
        font-weight: bold;
    }
    .swiper-pagination-bullet-active {
        background: #b5106a !important;
    }
</style>

<main class="pt-32 pb-20 px-8 max-w-screen-2xl mx-auto">

    <div class="text-center max-w-3xl mx-auto mb-20">
        <span class="text-[#b5106a] font-bold tracking-[0.3em] uppercase text-xs mb-4 block">
            The Selection
        </span>

        <h1 class="font-headline text-5xl md:text-6xl mb-6">
            Our Specialized Care
        </h1>

        <p class="text-gray-600 font-light text-lg">
            Discover a curated collection of beauty treatments designed to rejuvenate your spirit and enhance your natural glow.
        </p>
    </div>

    <div class="swiper servicesSwiper">
        <div class="swiper-wrapper">
            
            <div class="swiper-slide">
                <div onclick="openModal('nail-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl shadow-sm">
                    <img src="{{ asset('Nails_Services.jpg') }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
                        <h3 class="font-headline text-3xl text-white mb-2">Nail Care</h3>
                        <div class="flex items-center gap-2 w-fit bg-white/20 backdrop-blur-md border border-white/35 text-white text-sm font-medium px-4 py-1.5 rounded-full transition-all duration-300 group-hover:bg-white/35 group-hover:border-white/50">
                            <span>View services</span>
                            <span class="text-xs">→</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div onclick="openModal('eyelash-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl shadow-sm">
                    <img src="{{ asset('Eyelashing_Services.jpg') }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
                        <h3 class="font-headline text-3xl text-white mb-2">Eyelashing</h3>
                        <div class="flex items-center gap-2 w-fit bg-white/20 backdrop-blur-md border border-white/35 text-white text-sm font-medium px-4 py-1.5 rounded-full transition-all duration-300 group-hover:bg-white/35 group-hover:border-white/50">
                            <span>View services</span>
                            <span class="text-xs">→</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div onclick="openModal('facial-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl shadow-sm">
                    <img src="{{ asset('Facial_Services.jpg') }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
                        <h3 class="font-headline text-3xl text-white mb-2">Facial & Threading</h3>
                        <div class="flex items-center gap-2 w-fit bg-white/20 backdrop-blur-md border border-white/35 text-white text-sm font-medium px-4 py-1.5 rounded-full transition-all duration-300 group-hover:bg-white/35 group-hover:border-white/50">
                            <span>View services</span>
                            <span class="text-xs">→</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div onclick="openModal('hair-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl shadow-sm">
                    <img src="{{ asset('Hair_Services.jpg') }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
                        <h3 class="font-headline text-3xl text-white mb-2">Hair Services</h3>
                        <div class="flex items-center gap-2 w-fit bg-white/20 backdrop-blur-md border border-white/35 text-white text-sm font-medium px-4 py-1.5 rounded-full transition-all duration-300 group-hover:bg-white/35 group-hover:border-white/50">
                            <span>View services</span>
                            <span class="text-xs">→</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div onclick="openModal('waxing-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl shadow-sm">
                    <img src="{{ asset('Waxing_Services1.jpg') }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
                        <h3 class="font-headline text-3xl text-white mb-2">Waxing</h3>
                        <div class="flex items-center gap-2 w-fit bg-white/20 backdrop-blur-md border border-white/35 text-white text-sm font-medium px-4 py-1.5 rounded-full transition-all duration-300 group-hover:bg-white/35 group-hover:border-white/50">
                            <span>View services</span>
                            <span class="text-xs">→</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div onclick="openModal('massage-modal')" class="cursor-pointer group relative block h-[450px] overflow-hidden rounded-2xl shadow-sm">
                    <img src="{{ asset('Massage_Services.jpg') }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
                        <h3 class="font-headline text-3xl text-white mb-2">Relaxing Massage</h3>
                        <div class="flex items-center gap-2 w-fit bg-white/20 backdrop-blur-md border border-white/35 text-white text-sm font-medium px-4 py-1.5 rounded-full transition-all duration-300 group-hover:bg-white/35 group-hover:border-white/50">
                            <span>View services</span>
                            <span class="text-xs">→</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
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
            <button onclick="closeModal('{{ $menu['id'] }}')" class="absolute top-6 right-8 text-4xl text-gray-400 hover:text-[#b5106a] transition-colors">&times;</button>
            <div class="p-4">
                @include($menu['partial'])
            </div>
        </div>
    </div>
    @endforeach

</main>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper(".servicesSwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            }
        });
    });

    function openModal(id) {
        const modal = document.getElementById(id);
        if(modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        if(modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }
</script>

@endsection