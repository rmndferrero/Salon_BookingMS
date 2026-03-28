@php
    $categoryServices = \App\Models\Service::where('category', 'Eyelashing')->get();
@endphp

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
        @forelse($categoryServices as $service)
            <div class="group p-6 bg-surface-container/30 border border-primary/10 rounded-[2rem] hover:bg-white hover:shadow-xl transition-all duration-300 relative overflow-hidden">
                
                @if($service->is_package)
                    <div class="absolute top-0 right-0 bg-primary text-white px-5 py-1.5 rounded-bl-2xl text-[10px] font-bold uppercase tracking-widest z-10">
                        Package
                    </div>
                @endif

                <div class="flex justify-between items-start mb-4 relative z-0">
                    <h4 class="font-headline text-2xl group-hover:text-primary transition-colors pr-4">{{ $service->name }}</h4>
                    <span class="font-headline text-2xl text-nowrap">د.إ{{ number_format($service->price, 0) }}</span>
                </div>
                
                <p class="text-sm text-on-surface-variant mb-8 leading-relaxed italic">
                    {{ $service->description ?? 'Experience our premium ' . $service->name . ' service.' }}
                </p>
                
                <a href="{{ route('book') }}" class="block text-center border-2 border-primary text-primary w-full py-3.5 rounded-2xl text-xs font-bold uppercase tracking-widest hover:bg-primary hover:text-white transition-all">
                    Select
                </a>
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-on-surface-variant italic">
                No services are currently available in this category. Please check back soon!
            </div>
        @endforelse
    </div>
</section>