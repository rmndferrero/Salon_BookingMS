@extends('layouts.app')

@section('content')

    @if(session('success'))
        <div class="max-w-screen-2xl mx-auto px-8 mt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- HERO -->
    <section class="relative min-h-[921px] flex items-center px-8 md:px-24 overflow-hidden">

        <div class="max-w-4xl z-10">
            <span class="text-secondary font-label tracking-[0.3em] uppercase text-sm mb-6 block">
                Experience Sibs Style
            </span>

            <h1 class="font-headline text-6xl md:text-8xl text-on-surface leading-tight mb-8">
                Elegance in every detail. <br />
            </h1>

            <p class="text-on-surface-variant text-lg md:text-xl max-w-lg mb-12 font-light leading-relaxed">
                At Sibs Style Beauty Lounge, we believe beauty starts with a moment of peace. Step into our curated sanctuary for a personalized experience that refreshes your look and restores your spirit. From signature styling to rejuvenating treatments, let us pamper you from head to toe.
            </p>

            <div class="flex gap-6 items-center">
                <a href="{{ route('services') }}#services-grid"
                   class="bg-gradient-to-r from-primary to-primary-container text-white px-10 py-4 rounded-full font-label font-bold text-lg hover:shadow-2xl hover:shadow-primary/20 transition-all inline-block">
                    Book an Appointment
                </a>
            </div>
        </div>

        <!-- HERO IMAGES -->
        <div class="absolute right-0 top-1/2 -translate-y-1/2 w-1/2 h-[80%] hidden lg:block">
            <div class="relative w-full h-full">

                <div class="absolute top-0 right-10 w-2/3 h-2/3 rounded-xl overflow-hidden">
                    <img class="w-full h-full object-cover" src="{{ asset('sibs1.png') }}" />
                </div>

                <div class="absolute bottom-10 left-0 w-1/2 h-1/2 rounded-xl overflow-hidden shadow-2xl z-10 transform -rotate-3">
                    <img class="w-full h-full object-cover"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuD5eMbIlDDj25jAGfAoe2FPfx0mb6nsgbNVSkipS9KpSfeCR1wU-DUjt4LM5CY0Cyrl_OTUGBZD4ZLhNLf2gcQYfEke-fNr6nINKRYBzRL5d4XQwXp1IOf38RSPA0y5q0LawcxeUrQr5ZvUXrtms78vQIWopfwzW1XfX7wcXPrugln5M36SwztXjdErDOGWxcBoydabHhO8fR5hn37yUmXdOf88BgIjya-2f6c4mkv04LhqOW32MagxwXBoywX2Ncy6iNkwrLdU9SY" />
                </div>

                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-32 h-32 bg-secondary rounded-full opacity-10 blur-3xl"></div>

            </div>
        </div>

    </section>

    <!-- Salon Updates -->
    <section class="py-32 px-8 max-w-screen-2xl mx-auto" id="services">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($announcements as $index => $announcement)
                <div class="group relative bg-white p-2 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-500 
                    {{ $index === 1 ? 'h-[560px] md:-mt-12' : 'h-[500px]' }}">
                    
                    <div class="{{ $index === 1 ? 'h-[82%]' : 'h-3/4' }} rounded-lg overflow-hidden relative">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                            src="{{ asset('storage/' . $announcement->image_path) }}" 
                            alt="{{ $announcement->title }}" />
                    </div>

                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-headline text-2xl text-on-surface">
                                {{ $announcement->created_at->format('m/d/Y') }}
                            </h3>
                            <span class="text-secondary font-label font-bold text-right ml-4">
                                {{ $announcement->title }}
                            </span>
                        </div>
                        <p class="text-on-surface-variant text-sm font-body">
                            {{ Str::limit($announcement->content, 100) }}
                        </p>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-on-surface-variant italic">No recent updates. Check back soon!</p>
            @endforelse
        </div>

    </section>

    <!-- AESTHETIC STATEMENT -->
    <section class="py-20 bg-surface-container-low/50">

        <div class="max-w-4xl mx-auto text-center px-8">

            <span class="material-symbols-outlined text-secondary text-5xl mb-8"
                  style="font-variation-settings: 'FILL' 1;">
                spa
            </span>

            <h2 class="font-headline text-4xl md:text-5xl italic text-on-surface leading-tight">
                "True elegance is the harmony of feeling good and looking your best. In a world that never stops moving, we offer you the space to simply be. Your beauty is our craft; your serenity is our purpose."
            </h2>

            <div class="mt-8 flex justify-center items-center gap-4">
                <div class="h-px w-12 bg-outline-variant"></div>

                <span class="font-label uppercase tracking-widest text-xs text-on-surface-variant">
                    Sib Style Philosophy
                </span>

                <div class="h-px w-12 bg-outline-variant"></div>
            </div>

        </div>

    </section>

    <!-- GALLERY -->
    <section class="py-32 px-8 max-w-screen-2xl mx-auto" id="gallery">

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            <!-- TEXT SIDE -->
            <div class="lg:col-span-2 flex flex-col justify-center pr-12">

                <h2 class="font-headline text-6xl text-on-surface mb-8">
                    Visual <br /> Essence
                </h2>

                <p class="font-body text-on-surface-variant mb-12">
                    Browse our latest creations and sanctuary transformations. Every frame is a testament to our commitment to aesthetic excellence.
                </p>

                <button class="self-start text-primary font-label font-bold uppercase tracking-tighter border-b-2 border-primary pb-1">
                    Learn More About Us
                </button>

            </div>

            <!-- IMAGES COLUMN 1 -->
            <div class="lg:col-span-1 space-y-8">

                <img class="w-full aspect-square object-cover rounded-xl grayscale hover:grayscale-0 transition-all duration-700"
                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuAVFuibStSbmf3u10suZrkk79WTWLvU80GU6fmSIqfyD_u0E0p1aNLhUydHCL4CBOaiNRe8e3SF-u0_4uM5XWPzx5JubXjHM9Mbizq0Dv_MpDtw2-Mmh424I_j_72cjGaWSoEY1nMw-xCga_GVlY-xsCAFmSJxokVZ1fdKM_UH01WDbue3N3jh5WalHJkBcdQEhyBBNHSXzS0BOWXIdwtS_cRILtRbrbFALyKMoexd-9jhT-WJSo2iQMNX8FtaYPQ2hLqKuNWkqbpU" />

                <img class="w-full aspect-[3/4] object-cover rounded-xl shadow-lg"
                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuBULu3O8gSpGYVzZ3escEYFR3NDcjJHAHqNGSIhDkBEtPILn5fDHymK-PC7PKuf4cyys0OH83lAf6S7a_fSxo0WwX2SKpKzW2O13arbk9s1vgEC_Iv5erzsdmwJp2TRN0A6skpTNYXGX0qxyaMOpMfIlAWuLim9gO-fi3h_c-9n5o995bzXrpbaw7sgB7MY8zZjAJzLSg42nkENIEvzkinA-hiXcKVm25nvoDfPKyFu_IlyyWHCrmc2cTTnororxOK1AyKhwa3p8GI" />

            </div>

            <!-- IMAGE COLUMN 2 -->
            <div class="lg:col-span-1 pt-24">

                <img class="w-full aspect-[2/3] object-cover rounded-xl shadow-lg"
                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuB485b4C6_uGFb1qFIvskCQArc3VusEAhgycqWpA84x86ej9qry9SV_EA2UzJyscj0vMFdaTWeyRIMKRa6uEN2odxvBPi2DlRq7XzZsdRCde6eET0H_Wm34X256ukZLJyCaABzEj1inCZTVvSkDu0VTu4h6FZ0uR1FdBaXP0CV5tYyCV9PkZnD7GCScQEExkNafLyNtUI3OR0U9VPvI-GuulGBySzqmL35Ad__mHoIKNeJz752vMB49Drugor5YVwK6PcPL-ei4j_0" />

            </div>

        </div>

    </section>

@endsection