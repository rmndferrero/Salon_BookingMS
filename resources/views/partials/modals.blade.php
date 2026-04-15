    <!-- LOGIN MODAL -->
    <div id="loginModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center bg-black/60 backdrop-blur-sm px-4">
        <div class="bg-white w-full max-w-md rounded-3xl overflow-hidden shadow-2xl transform transition-all">
            <div class="p-8 relative">

                <button onclick="toggleModal()" class="absolute top-6 right-6 text-on-surface-variant hover:text-primary transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>

                <div class="text-center mb-8">
                    <h2 class="font-headline text-3xl text-on-surface mb-2">Welcome Back</h2>
                    <p class="font-body text-on-surface-variant text-sm">
                        Enter your details to access the sanctuary.
                    </p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="phone_number" class="block font-label text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">
                            Phone Number
                        </label>
                        <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}"
                            class="w-full bg-surface-container-low border-none rounded-full px-6 py-3 focus:ring-2 focus:ring-primary/20 outline-none font-body" required>
                        @error('phone_number')
                            <span class="text-error text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block font-label text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">
                            Password
                        </label>
                        <input type="password" id="password" name="password"
                            class="w-full bg-surface-container-low border-none rounded-full px-6 py-3 focus:ring-2 focus:ring-primary/20 outline-none font-body" required>
                        @error('password')
                            <span class="text-error text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="w-full bg-primary text-white py-4 rounded-full font-label font-bold text-xs uppercase tracking-widest hover:opacity-90 transition-all shadow-lg shadow-primary/20">
                        Log In
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-sm text-on-surface-variant font-body">
                        New to Sibs?
                        <button type="button" onclick="switchToRegister()" class="text-primary font-bold hover:underline">
                            Create an account
                        </button>
                    </p>
                </div>

            </div>
        </div>
    </div>
    <!-- LOGIN MODAL -->

    <!-- REGISTER MODAL -->
    <div id="registerModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center bg-black/60 backdrop-blur-sm px-4">
        <div class="bg-white w-full max-w-md rounded-3xl overflow-hidden shadow-2xl transform transition-all max-h-[90vh] overflow-y-auto">
            <div class="p-8 relative">

                <button onclick="toggleRegisterModal()" class="absolute top-6 right-6 text-on-surface-variant hover:text-primary transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>

                <div class="text-center mb-8">
                    <h2 class="font-headline text-3xl text-on-surface mb-2">Create an Account</h2>
                    <p class="font-body text-on-surface-variant text-sm">
                        Join the Sibs Collective for a curated beauty experience.
                    </p>
                </div>

                <form action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf

                    <div class="grid grid-cols-2 gap-4">

                        <div>
                            <label for="reg_first_name" class="block font-label text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">
                                First Name
                            </label>
                            <input type="text" id="reg_first_name" name="first_name" value="{{ old('first_name') }}"
                                class="w-full bg-surface-container-low border-none rounded-full px-6 py-3 focus:ring-2 focus:ring-primary/20 outline-none font-body text-sm" required>
                            @error('first_name')
                                <span class="text-error text-[10px] mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="reg_last_name" class="block font-label text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">
                                Last Name
                            </label>
                            <input type="text" id="reg_last_name" name="last_name" value="{{ old('last_name') }}"
                                class="w-full bg-surface-container-low border-none rounded-full px-6 py-3 focus:ring-2 focus:ring-primary/20 outline-none font-body text-sm" required>
                            @error('last_name')
                                <span class="text-error text-[10px] mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div>
                        <label for="reg_phone_number" class="block font-label text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">
                            Phone Number
                        </label>
                        <input 
                                type="text" 
                                id="reg_phone_number" 
                                name="phone_number" 
                                value="{{ old('phone_number') }}"
                                required 
                                maxlength="11"
                                minlength="11"
                                pattern="\d{11}"
                                title="Please enter exactly 11 digits"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                placeholder=""
                                class="w-full bg-surface-container-low border-none rounded-full px-6 py-3 focus:ring-2 focus:ring-primary/20 outline-none font-body text-sm"
                            >
                            @error('phone_number')
                                <span class="text-error text-[10px] mt-1 block">{{ $message }}</span>
                            @enderror
                    </div>

                    <div>
                        <label for="reg_password" class="block font-label text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">
                            Password (Min. 8)
                        </label>
                        <input type="password" id="reg_password" name="password"
                            class="w-full bg-surface-container-low border-none rounded-full px-6 py-3 focus:ring-2 focus:ring-primary/20 outline-none font-body text-sm" required>
                        @error('password')
                            <span class="text-error text-[10px] mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block font-label text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">
                            Confirm Password
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="w-full bg-surface-container-low border-none rounded-full px-6 py-3 focus:ring-2 focus:ring-primary/20 outline-none font-body text-sm" required>
                    </div>

                    <button type="submit" class="w-full bg-primary text-white py-4 mt-4 rounded-full font-label font-bold text-xs uppercase tracking-widest hover:opacity-90 transition-all shadow-lg shadow-primary/20">
                        Register
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-on-surface-variant font-body">
                        Already have an account?
                        <button type="button" onclick="switchToLogin()" class="text-primary font-bold hover:underline">
                            Log in here
                        </button>
                    </p>
                </div>

            </div>
        </div>
    </div>
    <!-- REGISTER MODAL -->