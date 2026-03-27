<section class="py-8 px-4">
    {{-- Header Section --}}
    <div class="mb-12 text-center">
        <h2 class="font-headline text-4xl text-on-surface">Eyelash & Brows</h2>
        <div class="w-16 h-1 bg-primary mx-auto mt-4 rounded-full"></div>
        <p class="text-on-surface-variant mt-4 font-body italic max-w-lg mx-auto">
            Frame your gaze with precision-crafted extensions and lifts.
        </p>
    </div>

    {{-- Services Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        {{-- Classic --}}
        <div class="group p-6 bg-surface-container/30 border border-primary/10 rounded-[2rem] hover:bg-white hover:shadow-xl transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <h4 class="font-headline text-2xl group-hover:text-primary transition-colors">Classic</h4>
                <span class="font-headline text-2xl text-on-surface">120د.إ</span>
            </div>
            <p class="text-sm text-on-surface-variant mb-8 italic leading-relaxed">(Insert Details)</p>
            <a href="{{ route('book') }}" class="block text-center border-2 border-primary text-primary w-full py-3.5 rounded-2xl text-xs font-bold uppercase tracking-widest hover:bg-primary hover:text-white transition-all">
                Select
            </a>
        </div>

        {{-- Volume (Highlighted Card) --}}
        <div class="group p-6 bg-white border-2 border-primary/20 rounded-[2rem] shadow-lg relative overflow-hidden transform hover:-translate-y-1 transition-all duration-300">
            <div class="absolute top-0 right-0 bg-primary text-white px-5 py-1.5 rounded-bl-2xl text-[10px] font-bold uppercase tracking-widest">
                Most Popular
            </div>
            <div class="flex justify-between items-start mb-4">
                <h4 class="font-headline text-2xl text-primary">Volume (3D/5D)</h4>
                <span class="font-headline text-2xl text-on-surface">180/200د.إ</span>
            </div>
            <p class="text-sm text-on-surface-variant mb-8 italic leading-relaxed">(Insert Details)</p>
            <a href="{{ route('book') }}" class="block text-center bg-primary text-white w-full py-4 rounded-2xl text-xs font-bold uppercase tracking-widest hover:shadow-lg transition-all">
                Book Volume
            </a>
        </div>

        {{-- Mega Volume --}}
        <div class="group p-6 bg-surface-container/30 border border-primary/10 rounded-[2rem] hover:bg-white hover:shadow-xl transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <h4 class="font-headline text-2xl group-hover:text-primary transition-colors">Mega Volume</h4>
                <span class="font-headline text-2xl">250د.إ</span>
            </div>
            <p class="text-sm text-on-surface-variant mb-8 italic leading-relaxed">(Insert Details)</p>
            <a href="{{ route('book') }}" class="block text-center border-2 border-primary text-primary w-full py-3.5 rounded-2xl text-xs font-bold uppercase tracking-widest hover:bg-primary hover:text-white transition-all">
                Select
            </a>
        </div>

        {{-- Lash Lift --}}
        <div class="group p-6 bg-surface-container/30 border border-primary/10 rounded-[2rem] hover:bg-white hover:shadow-xl transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <h4 class="font-headline text-2xl group-hover:text-primary transition-colors">Lash Lift</h4>
                <span class="font-headline text-2xl">د.إ70</span>
            </div>
            <p class="text-sm text-on-surface-variant mb-8 italic leading-relaxed">(Insert Details)</p>
            <a href="{{ route('book') }}" class="block text-center border-2 border-primary text-primary w-full py-3.5 rounded-2xl text-xs font-bold uppercase tracking-widest hover:bg-primary hover:text-white transition-all">
                Select
            </a>
        </div>

        {{-- Brow Lamination (Spans 2 columns on desktop for visual balance) --}}
        <div class="group p-6 bg-surface-container/30 border border-primary/10 rounded-[2rem] hover:bg-white hover:shadow-xl transition-all duration-300 md:col-span-2">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="text-center md:text-left">
                    <h4 class="font-headline text-2xl group-hover:text-primary transition-colors">Brow Lamination</h4>
                    <p class="text-sm text-on-surface-variant italic">(Insert Details)</p>
                </div>
                <div class="flex items-center gap-6">
                    <span class="font-headline text-2xl text-nowrap">د.إ850</span>
                    <a href="{{ route('book') }}" class="bg-primary text-white px-8 py-3 rounded-2xl text-xs font-bold uppercase tracking-widest hover:scale-105 transition-all">Select Service</a>
                </div>
            </div>
        </div>

    </div>
</section>