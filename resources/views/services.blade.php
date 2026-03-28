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

<div id="floating-cart" class="fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 shadow-[0_-20px_40px_rgba(0,0,0,0.08)] transform translate-y-full transition-transform duration-300 z-50">
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

<script>
    let cart = [];

    function toggleCartItem(button) {
        // Extract data from the clicked button
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const price = parseFloat(button.getAttribute('data-price'));
        const duration = parseInt(button.getAttribute('data-duration'));

        // Check if the item is already in the cart
        const existingIndex = cart.findIndex(item => item.id === id);

        if (existingIndex > -1) {
            // REMOVE from cart
            cart.splice(existingIndex, 1);
            
            // Revert button styling to unselected
            button.innerText = 'Select';
            button.classList.remove('bg-[#b5106a]', 'text-white');
            button.classList.add('text-[#b5106a]');
        } else {
            // ADD to cart
            cart.push({ id, name, price, duration });
            
            // Update button styling to show it's selected
            button.innerText = '✓ Selected';
            button.classList.remove('text-[#b5106a]');
            button.classList.add('bg-[#b5106a]', 'text-white');
        }

        updateCartUI();
    }

    function updateCartUI() {
        const floatingCart = document.getElementById('floating-cart');
        const cartCount = document.getElementById('cart-count');
        const cartDuration = document.getElementById('cart-duration');
        const cartPrice = document.getElementById('cart-price');

        if (cart.length === 0) {
            // Hide the bar if cart is empty
            floatingCart.classList.add('translate-y-full');
        } else {
            // Show the bar and update the math
            floatingCart.classList.remove('translate-y-full');
            
            let totalDuration = 0;
            let totalPrice = 0;

            cart.forEach(item => {
                totalDuration += item.duration;
                totalPrice += item.price;
            });

            cartCount.innerText = cart.length;
            
            // Format duration nicely (e.g., 90 mins -> 1 hr 30 mins)
            if (totalDuration >= 60) {
                let hours = Math.floor(totalDuration / 60);
                let mins = totalDuration % 60;
                cartDuration.innerText = mins > 0 ? `${hours} hr ${mins} mins` : `${hours} hr`;
            } else {
                cartDuration.innerText = `${totalDuration} mins`;
            }
            
            cartPrice.innerText = `د.إ${totalPrice.toFixed(2)}`;
        }
    }

    // Placeholder for Step 4
    function openCalendarModal() {
        console.log("Preparing to open calendar with total duration:", cart.reduce((sum, item) => sum + item.duration, 0));
        alert("Cart logic is working! Total Duration: " + cart.reduce((sum, item) => sum + item.duration, 0) + " minutes. Ready for Step 4: The Calendar Modal!");
    }
</script>

@endsection