<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book an Appointment - Sib Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400&family=Manrope:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <style> body { font-family: 'Manrope', sans-serif; background-color: #f4f3f2; } </style>
</head>
<body class="text-[#1a1c1c] pb-24">

    <nav class="bg-[#b5106a] p-4 text-center text-white shadow-md mb-12">
        <div class="text-2xl font-serif italic tracking-tight">Sib Style Beauty Lounge</div>
    </nav>

    <main class="max-w-3xl mx-auto px-6">
        <form action="{{ route('booking.store') }}" method="POST" id="bookingForm">
            @csrf
            
            <div id="step-1" class="block">
                <h2 class="text-3xl font-serif mb-2">Step 1: Select Your Services</h2>
                <p class="text-gray-500 mb-8">Choose one or more treatments for your sanctuary experience.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    @foreach($services as $service)
                        <label class="block cursor-pointer">
                            <input type="checkbox" name="services[]" value="{{ $service->id }}" class="peer sr-only service-checkbox" data-name="{{ $service->name }}" data-price="{{ $service->price }}">
                            <div class="bg-white p-6 rounded-xl border-2 border-transparent shadow-sm peer-checked:border-[#b5106a] peer-checked:bg-pink-50 hover:shadow-md transition-all">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-lg">{{ $service->name }}</h3>
                                    <span class="font-bold text-[#b5106a]">${{ number_format($service->price, 2) }}</span>
                                </div>
                                <p class="text-sm text-gray-500">{{ $service->description }}</p>
                            </div>
                        </label>
                    @endforeach
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="nextStep(2)" class="bg-[#1a1c1c] text-white px-8 py-3 rounded-full font-bold uppercase tracking-wider hover:bg-black transition">Continue to Date →</button>
                </div>
            </div>

            <div id="step-2" class="hidden">
                <h2 class="text-3xl font-serif mb-2">Step 2: Choose a Date</h2>
                <p class="text-gray-500 mb-8">When would you like to visit us?</p>
                
                <div class="bg-white p-8 rounded-xl shadow-sm mb-8 text-center">
                    <input type="date" name="appointment_date" id="appointment_date" required class="text-2xl border-b-2 border-gray-300 focus:border-[#b5106a] outline-none p-2 bg-transparent text-[#1a1c1c]">
                </div>

                <div class="flex justify-between">
                    <button type="button" onclick="nextStep(1)" class="text-gray-500 font-bold hover:text-black">← Back</button>
                    <button type="button" onclick="generateSummary()" class="bg-[#1a1c1c] text-white px-8 py-3 rounded-full font-bold uppercase tracking-wider hover:bg-black transition">Review Booking →</button>
                </div>
            </div>

            <div id="step-3" class="hidden">
                <h2 class="text-3xl font-serif mb-2">Step 3: Review Details</h2>
                <p class="text-gray-500 mb-8">Please confirm your sanctuary appointment.</p>
                
                <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100 mb-8">
                    <h3 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-4">Date</h3>
                    <p id="summary-date" class="text-xl font-bold mb-6 text-[#b5106a]"></p>

                    <h3 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-4">Selected Services</h3>
                    <ul id="summary-services" class="space-y-3 mb-6 border-b border-gray-200 pb-6">
                        </ul>

                    <div class="flex justify-between items-center text-2xl">
                        <span class="font-serif">Total</span>
                        <span id="summary-total" class="font-bold text-[#b5106a]">$0.00</span>
                    </div>
                </div>

                @guest
                    <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100 mb-8 text-left">
                        <h3 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-4">Your Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <input type="text" name="first_name" placeholder="First Name" required class="w-full border-b-2 border-gray-300 focus:border-[#b5106a] outline-none p-2 bg-transparent">
                            <input type="text" name="last_name" placeholder="Last Name" required class="w-full border-b-2 border-gray-300 focus:border-[#b5106a] outline-none p-2 bg-transparent">
                        </div>
                        <input type="text" name="phone_number" placeholder="Phone Number" required class="w-full border-b-2 border-gray-300 focus:border-[#b5106a] outline-none p-2 bg-transparent mb-6">
                        
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="hidden" name="is_creating_account" value="0">
                            <input type="checkbox" name="is_creating_account" value="1" class="w-4 h-4 text-[#b5106a] border-gray-300 rounded focus:ring-[#b5106a]" onchange="document.getElementById('password-field').classList.toggle('hidden')">
                            <span class="text-sm text-gray-600 group-hover:text-black transition">Create an account for faster booking next time</span>
                        </label>
                        
                        <div id="password-field" class="hidden mt-4">
                            <input type="password" name="password" placeholder="Create a secure password" class="w-full border-b-2 border-gray-300 focus:border-[#b5106a] outline-none p-2 bg-transparent">
                        </div>
                    </div>
                @endguest

                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <button type="button" onclick="nextStep(2)" class="text-gray-500 font-bold hover:text-black order-2 md:order-1">← Modify Booking</button>
                    
                    <button type="submit" class="w-full md:w-auto bg-gradient-to-r from-[#b5106a] to-pink-500 text-white px-12 py-5 rounded-full font-bold text-lg uppercase tracking-wider shadow-xl hover:shadow-pink-500/30 hover:scale-105 transition-all order-1 md:order-2">
                        Confirm Appointment
                    </button>
                </div>
            </div>

        </form>
    </main>

    <script>
        function nextStep(stepNumber) {
            document.getElementById('step-1').classList.add('hidden');
            document.getElementById('step-2').classList.add('hidden');
            document.getElementById('step-3').classList.add('hidden');
            document.getElementById('step-' + stepNumber).classList.remove('hidden');
        }

        function generateSummary() {
            // Check if a date is selected
            const dateInput = document.getElementById('appointment_date').value;
            if(!dateInput) {
                alert('Please select a date first.');
                return;
            }

            // Get selected services
            const checkboxes = document.querySelectorAll('.service-checkbox:checked');
            if(checkboxes.length === 0) {
                alert('Please select at least one service.');
                nextStep(1);
                return;
            }

            const summaryList = document.getElementById('summary-services');
            summaryList.innerHTML = '';
            let total = 0;

            checkboxes.forEach(cb => {
                let name = cb.getAttribute('data-name');
                let price = parseFloat(cb.getAttribute('data-price'));
                total += price;

                summaryList.innerHTML += `<li class="flex justify-between"><span class="text-gray-700">${name}</span> <span class="font-bold">$${price.toFixed(2)}</span></li>`;
            });

            // Format date for display
            const dateObj = new Date(dateInput);
            document.getElementById('summary-date').innerText = dateObj.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
            
            // Set Total
            document.getElementById('summary-total').innerText = '$' + total.toFixed(2);

            nextStep(3);
        }
    </script>
</body>
</html>