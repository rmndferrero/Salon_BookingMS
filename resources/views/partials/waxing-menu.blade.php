<section class="py-8 px-4">
    {{-- Header Section --}}
    <div class="mb-12 text-center">
        <h2 class="font-headline text-4xl text-on-surface">Waxing</h2>
        <div class="w-16 h-1 bg-primary mx-auto mt-4 rounded-full"></div>
        <p class="text-on-surface-variant mt-4 font-body italic max-w-lg mx-auto">
            Gentle and effective hair removal for smooth, silky skin.
        </p>
    </div>

    {{-- Services Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        {{-- Arms --}}
        <div class="group p-6 bg-surface-container/30 border border-primary/10 rounded-[2rem] hover:bg-white hover:shadow-xl transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <h4 class="font-headline text-2xl group-hover:text-primary transition-colors">Half / Full Arm</h4>
                <span class="font-headline text-2xl text-on-surface text-nowrap">30/50 د.إ</span>
            </div>
            <p class="text-sm text-on-surface-variant mb-8 italic leading-relaxed">(Insert Details)</p>
            <a href="{{ route('book') }}" class="block text-center border-2 border-primary text-primary w-full py-3.5 rounded-2xl text-xs font-bold uppercase tracking-widest hover:bg-primary hover:text-white transition-all">
                Select
            </a>
        </div>

        {{-- Legs --}}
        <div class="group p-6 bg-surface-container/30 border border-primary/10 rounded-[2rem] hover:bg-white hover:shadow-xl transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <h4 class="font-headline text-2xl group-hover:text-primary transition-colors">Half / Full Leg</h4>
                <span class="font-headline text-2xl text-on-surface text-nowrap">40/60 د.إ</span>
            </div>
            <p class="text-sm text-on-surface-variant mb-8 italic leading-relaxed">(Insert Details)</p>
            <a href="{{ route('book') }}" class="block text-center border-2 border-primary text-primary w-full py-3.5 rounded-2xl text-xs font-bold uppercase tracking-widest hover:bg-primary hover:text-white transition-all">
                Select
            </a>
        </div>

        {{-- Underarm --}}
        <div class="group p-6 bg-surface-container/30 border border-primary/10 rounded-[2rem] hover:bg-white hover:shadow-xl transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <h4 class="font-headline text-2xl group-hover:text-primary transition-colors">Underarm Wax</h4>
                <span class="font-headline text-2xl text-on-surface">15 د.إ</span>
            </div>
            <p class="text-sm text-on-surface-variant mb-8 italic leading-relaxed">(Insert Details)</p>
            <a href="{{ route('book') }}" class="block text-center border-2 border-primary text-primary w-full py-3.5 rounded-2xl text-xs font-bold uppercase tracking-widest hover:bg-primary hover:text-white transition-all">
                Select
            </a>
        </div>

        {{-- Brazilian --}}
        <div class="group p-6 bg-surface-container/30 border border-primary/10 rounded-[2rem] hover:bg-white hover:shadow-xl transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <h4 class="font-headline text-2xl group-hover:text-primary transition-colors">Brazilian</h4>
                <span class="font-headline text-2xl text-on-surface">60 د.إ</span>
            </div>
            <p class="text-sm text-on-surface-variant mb-8 italic leading-relaxed">(Insert Details)</p>
            <a href="{{ route('book') }}" class="block text-center border-2 border-primary text-primary w-full py-3.5 rounded-2xl text-xs font-bold uppercase tracking-widest hover:bg-primary hover:text-white transition-all">
                Select
            </a>
        </div>

        {{-- Upper Lip/Eyebrow --}}
        <div class="group p-6 bg-surface-container/30 border border-primary/10 rounded-[2rem] hover:bg-white hover:shadow-xl transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <h4 class="font-headline text-2xl group-hover:text-primary transition-colors">Upper Lip / Brow</h4>
                <span class="font-headline text-2xl text-on-surface">10 د.إ</span>
            </div>
            <p class="text-sm text-on-surface-variant mb-8 italic leading-relaxed">(Insert Details)</p>
            <a href="{{ route('book') }}" class="block text-center border-2 border-primary text-primary w-full py-3.5 rounded-2xl text-xs font-bold uppercase tracking-widest hover:bg-primary hover:text-white transition-all">
                Select
            </a>
        </div>

        {{-- Full Body (Featured) --}}
        <div class="group p-6 bg-white border-2 border-primary/20 rounded-[2rem] shadow-lg relative overflow-hidden transform hover:-translate-y-1 transition-all duration-300">
            <div class="absolute top-0 right-0 bg-primary text-white px-5 py-1.5 rounded-bl-2xl text-[10px] font-bold uppercase tracking-widest">
                Full Smooth
            </div>
            <div class="flex justify-between items-start mb-4">
                <h4 class="font-headline text-2xl text-primary">Full Body Wax</h4>
                <span class="font-headline text-2xl text-on-surface">150 د.إ</span>
            </div>
            <p class="text-sm text-on-surface-variant mb-8 italic leading-relaxed">(Insert Details)</p>
            <a href="{{ route('book') }}" class="block text-center bg-primary text-white w-full py-4 rounded-2xl text-xs font-bold uppercase tracking-widest hover:shadow-lg transition-all">
                Book Full Body
            </a>
        </div>

    </div>
</section>