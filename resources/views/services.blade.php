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

    {{-- FLOATING CART --}}
    <div id="floating-cart" class="fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 shadow-[0_-20px_40px_rgba(0,0,0,0.08)] transform translate-y-full transition-transform duration-300 z-40">
        <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-6 text-[#1a1c1c]">
                <div>
                    <span id="cart-count" class="font-headline text-xl font-bold">0</span> 
                    <span class="text-sm text-gray-500 uppercase tracking-widest">Services</span>
                </div>
                <div class="w-px h-8 bg-gray-300"></div>
                <div>
                    <span class="text-sm text-gray-500 uppercase tracking-widest block text-[10px]">Total Time</span>
                    <span id="cart-duration" class="font-bold">0 mins</span>
                </div>
                <div class="w-px h-8 bg-gray-300 hidden md:block"></div>
                <div class="hidden md:block">
                    <span class="text-sm text-gray-500 uppercase tracking-widest block text-[10px]">Total Price</span>
                    <span id="cart-price" class="font-bold text-[#b5106a] text-lg">د.إ0.00</span>
                </div>
            </div>
            <button onclick="openCalendarModal()" class="w-full md:w-auto bg-[#b5106a] text-white px-10 py-4 rounded-full font-bold uppercase tracking-widest hover:scale-105 transition-transform shadow-lg shadow-pink-500/30">
                Choose Time →
            </button>
        </div>
    </div>

    {{-- CALENDAR MODAL --}}
    <div id="calendar-modal" class="fixed inset-0 bg-[#1a1c1c]/80 z-[100] hidden flex items-center justify-center backdrop-blur-sm transition-opacity">
        <div class="bg-white w-full max-w-6xl h-[90vh] md:h-[85vh] rounded-[2rem] shadow-2xl flex flex-col overflow-hidden relative">
            <div class="p-6 md:p-8 border-b border-gray-100 flex justify-between items-center bg-white z-10">
                <div>
                    <h2 class="font-headline text-3xl text-[#1a1c1c]">Select a Time</h2>
                    <p class="text-gray-500 text-sm mt-1" id="modal-duration-text">Loading...</p>
                </div>
                <button onclick="closeCalendarModal()" class="text-gray-400 hover:text-[#b5106a] text-4xl leading-none">&times;</button>
            </div>

            <div class="flex-1 overflow-auto bg-gray-50 p-4 md:p-8 relative" id="calendar-container">
                <div class="flex items-center justify-center h-full text-gray-400 font-bold tracking-widest uppercase animate-pulse">
                    Fetching Availability...
                </div>
            </div>

            <div class="p-6 border-t border-gray-100 bg-white">
                <form id="checkout-form" action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    <div id="hidden-services-inputs"></div>
                    <input type="hidden" name="appointment_date" id="input_appointment_date">
                    <input type="hidden" name="start_time" id="input_start_time">
                    
                    <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                        <div class="text-[#1a1c1c] w-full md:w-auto">
                            <span class="text-sm text-gray-500 block uppercase tracking-widest font-bold text-[10px]">Selected Slot:</span>
                            <span id="selected-slot-text" class="font-headline text-2xl text-[#b5106a]">Please pick a time</span>
                        </div>

                        @guest
                        <div class="flex-1 w-full grid grid-cols-1 md:grid-cols-3 gap-3">
                            <input type="text" name="first_name" placeholder="First Name" required class="border-b-2 border-gray-200 focus:border-[#b5106a] outline-none p-2 bg-transparent text-sm">
                            <input type="text" name="last_name" placeholder="Last Name" required class="border-b-2 border-gray-200 focus:border-[#b5106a] outline-none p-2 bg-transparent text-sm">
                            <input type="text" name="phone_number" placeholder="Phone Number" required class="border-b-2 border-gray-200 focus:border-[#b5106a] outline-none p-2 bg-transparent text-sm">
                        </div>
                        @endguest

                        <button type="submit" id="confirm-booking-btn" disabled class="w-full md:w-auto bg-gray-300 text-gray-500 px-10 py-4 rounded-full font-bold uppercase tracking-widest transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                            Confirm
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    // --- CAROUSEL & MODAL LOGIC ---
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

    // --- CART LOGIC ---
    let cart = [];

    function toggleCartItem(button) {
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const price = parseFloat(button.getAttribute('data-price'));
        const duration = parseInt(button.getAttribute('data-duration'));

        const existingIndex = cart.findIndex(item => item.id === id);

        if (existingIndex > -1) {
            cart.splice(existingIndex, 1);
            button.innerText = 'Select';
            button.classList.remove('bg-[#b5106a]', 'text-white');
            button.classList.add('text-[#b5106a]');
        } else {
            cart.push({ id, name, price, duration });
            button.innerText = '✓ Selected';
            button.classList.remove('text-[#b5106a]');
            button.classList.add('bg-[#b5106a]', 'text-white');
        }
        updateCartUI();
    }

    function updateCartUI() {
        const floatingCart = document.getElementById('floating-cart');
        if (cart.length === 0) {
            floatingCart.classList.add('translate-y-full');
        } else {
            floatingCart.classList.remove('translate-y-full');
            let totalDuration = 0;
            let totalPrice = 0;

            cart.forEach(item => {
                totalDuration += item.duration;
                totalPrice += item.price;
            });

            document.getElementById('cart-count').innerText = cart.length;
            
            if (totalDuration >= 60) {
                let hours = Math.floor(totalDuration / 60);
                let mins = totalDuration % 60;
                document.getElementById('cart-duration').innerText = mins > 0 ? `${hours} hr ${mins} mins` : `${hours} hr`;
            } else {
                document.getElementById('cart-duration').innerText = `${totalDuration} mins`;
            }
            document.getElementById('cart-price').innerText = `د.إ${totalPrice.toFixed(2)}`;
        }
    }

    // --- CALENDAR LOGIC ---
    let selectedDate = null;
    let selectedTime = null;

    async function generateCalendarGrid() {
        const container = document.getElementById('calendar-container');
        container.innerHTML = `<div class="flex items-center justify-center h-full text-[#b5106a] font-bold tracking-widest uppercase animate-pulse">Calculating Staff Capacity...</div>`;
        
        let dates = [];
        let startDay = new Date();
        startDay.setDate(startDay.getDate() + 1); // Start tomorrow
        
        for(let i=0; i<7; i++) {
            let d = new Date(startDay);
            d.setDate(startDay.getDate() + i);
            dates.push(d);
        }

        const startDateString = dates[0].toISOString().split('T')[0];
        const endDateString = dates[6].toISOString().split('T')[0];
        const serviceIds = cart.map(item => item.id).join(',');

        try {
            const response = await fetch(`/api/availability?start_date=${startDateString}&end_date=${endDateString}&services[]=${cart.map(i=>i.id).join('&services[]=')}`, { cache: 'no-store' });
            const availableTimes = await response.json(); 
            
            let html = `<div class="overflow-x-auto"><table class="w-full bg-white rounded-xl shadow-sm border border-gray-100 min-w-[800px]">`;
            html += `<thead><tr class="bg-[#b5106a] text-white"><th class="p-4 text-left font-headline">Time</th>`;
            
            dates.forEach(d => {
                const dayName = d.toLocaleDateString('en-US', { weekday: 'short' });
                const dayNum = d.getDate();
                html += `<th class="p-4 text-center border-l border-white/10"><span class="block text-[10px] uppercase tracking-widest">${dayName}</span><span class="text-xl font-bold">${dayNum}</span></th>`;
            });
            html += `</tr></thead><tbody>`;

            for(let hour = 10; hour <= 21; hour++) {
                for(let mins of ['00', '30']) {
                    const timeString = `${hour.toString().padStart(2, '0')}:${mins}`;
                    const timeLabel = formatTimeLabel(hour, mins);
                    
                    html += `<tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">`;
                    html += `<td class="p-3 text-sm font-bold text-gray-400 whitespace-nowrap">${timeLabel}</td>`;
                    
                    dates.forEach(d => {
                        const dateString = d.toISOString().split('T')[0];
                        const dayOfWeek = d.getDay(); 
                        
                        let isClosed = false;
                        if ([1, 2, 3, 4].includes(dayOfWeek) && hour >= 21) isClosed = true;

                        let isAvailable = false;
                        if (availableTimes[dateString] && availableTimes[dateString].includes(timeString)) {
                            isAvailable = true;
                        }

                        if (isClosed) {
                            html += `<td class="p-2 border-l border-gray-100 bg-gray-100"></td>`;
                        } else if (!isAvailable) {
                            html += `<td class="p-2 border-l border-gray-100"><div class="bg-gray-100 text-gray-400 text-xs font-bold text-center py-2 rounded uppercase tracking-widest cursor-not-allowed opacity-60">Full</div></td>`;
                        } else {
                            html += `<td class="p-2 border-l border-gray-100 text-center">
                                        <button type="button" onclick="selectSlot('${dateString}', '${timeString}', this)" class="w-full py-2 text-xs font-bold text-[#b5106a] bg-pink-50 hover:bg-[#b5106a] hover:text-white rounded transition-colors time-slot-btn">
                                            Select
                                        </button>
                                     </td>`;
                        }
                    });
                    html += `</tr>`;
                }
            }
            html += `</tbody></table></div>`;
            container.innerHTML = html;
        } catch (error) {
            console.error("API Fetch Error:", error);
            container.innerHTML = `<div class="text-center py-20 text-red-500 font-bold">Error calculating capacity. Please refresh.</div>`;
        }
    }

    function openCalendarModal() {
        if (cart.length === 0) return;
        let totalCartDuration = cart.reduce((sum, item) => sum + item.duration, 0);
        document.getElementById('modal-duration-text').innerText = `Your services will take approximately ${totalCartDuration} minutes.`;
        document.getElementById('calendar-modal').classList.remove('hidden');
        document.body.style.overflow = 'hidden'; 
        generateCalendarGrid();
    }

    function closeCalendarModal() {
        document.getElementById('calendar-modal').classList.add('hidden');
        document.body.style.overflow = 'auto';
        resetSelection();
    }

    function selectSlot(date, time, btnElement) {
        document.querySelectorAll('.time-slot-btn').forEach(btn => {
            btn.classList.remove('bg-[#1a1c1c]', 'text-white', 'shadow-md');
            btn.classList.add('bg-pink-50', 'text-[#b5106a]');
            btn.innerText = 'Select';
        });

        btnElement.classList.remove('bg-pink-50', 'text-[#b5106a]');
        btnElement.classList.add('bg-[#1a1c1c]', 'text-white', 'shadow-md');
        btnElement.innerText = '✓ Picked';

        selectedDate = date;
        selectedTime = time;

        const dateObj = new Date(date);
        const formattedDate = dateObj.toLocaleDateString('en-US', { weekday: 'long', month: 'short', day: 'numeric' });
        
        document.getElementById('selected-slot-text').innerText = `${formattedDate} at ${formatTimeLabel(parseInt(time.split(':')[0]), time.split(':')[1])}`;
        document.getElementById('input_appointment_date').value = selectedDate;
        document.getElementById('input_start_time').value = selectedTime;
        
        document.getElementById('hidden-services-inputs').innerHTML = cart.map(item => `<input type="hidden" name="services[]" value="${item.id}">`).join('');

        const confirmBtn = document.getElementById('confirm-booking-btn');
        confirmBtn.disabled = false;
        confirmBtn.classList.remove('bg-gray-300', 'text-gray-500');
        confirmBtn.classList.add('bg-[#b5106a]', 'text-white', 'hover:bg-pink-700', 'shadow-lg');
    }

    function resetSelection() {
        selectedDate = null;
        selectedTime = null;
        document.getElementById('selected-slot-text').innerText = 'Please pick a time';
        const confirmBtn = document.getElementById('confirm-booking-btn');
        confirmBtn.disabled = true;
        confirmBtn.classList.add('bg-gray-300', 'text-gray-500');
        confirmBtn.classList.remove('bg-[#b5106a]', 'text-white', 'hover:bg-pink-700', 'shadow-lg');
    }

    function formatTimeLabel(hour, mins) {
        let ampm = hour >= 12 ? 'PM' : 'AM';
        let h = hour % 12 || 12;
        return `${h}:${mins} ${ampm}`;
    }
</script>

@endsection