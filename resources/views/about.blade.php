@extends('layouts.app')

@section('content')

    <!-- HERO: OUR STORY -->
    <section class="px-8 py-20 md:py-32 max-w-7xl mx-auto overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center">

            <div class="md:col-span-7 space-y-8">

                <span class="text-primary font-label tracking-[0.3em] uppercase text-xs font-bold">
                    About Us.
                </span>

                <h1 class="text-5xl md:text-7xl font-serif text-on-surface leading-tight italic">
                    Designed For<br /> You.
                </h1>

                <div class="max-w-xl space-y-6">
                    <p class="text-lg text-on-surface-variant font-body leading-relaxed">
                        At Sibs Style, we believe that the most beautiful thing you can wear is a sense of peace. Our lounge wasn't built just to change how you look, but to change how you feel. We know how busy life can get, so we've created a little corner of the world where you can finally put yourself first
                    </p>

                    <p class="text-lg text-on-surface-variant font-body leading-relaxed">
                        From a simple thread to a transformative treatment, everything we do is handled with care, patience, and a genuine love for our craft. You aren't just another appointment to us—you're a guest in our home.
                    </p>
                </div>

            </div>

            <div class="md:col-span-5 relative">

                <div class="aspect-[4/5] bg-surface-container rounded-xl overflow-hidden shadow-2xl">
                    <img
                        class="w-full h-full object-cover grayscale-[20%] hover:scale-105 transition-transform duration-700"
                        src="{{ asset('lounge.jpg') }}"
                    />
                </div>

                <div class="absolute -bottom-8 -left-8 bg-secondary-fixed p-8 rounded-xl hidden lg:block shadow-lg">
                    <p class="font-serif italic text-2xl text-on-secondary-fixed">
                        Est. 2025
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-32 px-8 bg-[#FFECF0]">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-16 md:gap-12">

                <!-- Testimonial 1 -->
                <div class="space-y-6 border-l border-primary/20 pl-8 relative">
                    <div class="flex gap-1 text-primary mb-4">
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">star</span>
                    </div>
                    <blockquote class="text-2xl font-serif italic text-on-surface leading-snug">
                        "An unparalleled escape. The attention to detail is purely poetic."
                    </blockquote>
                    <div class="flex items-center gap-3 pt-4">
                        <span class="w-6 h-[1px] bg-primary/40"></span>
                        <p class="font-label text-[10px] uppercase tracking-[0.2em] font-bold text-on-surface-variant">
                            Google Review <span class="mx-2 opacity-30">|</span> Client Since 2018
                        </p>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="space-y-6 border-l border-primary/20 pl-8 relative">
                    <div class="flex gap-1 text-primary mb-4">
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">star</span>
                    </div>
                    <blockquote class="text-2xl font-serif italic text-on-surface leading-snug">
                        "The only space where I truly feel seen. A masterpiece of wellness."
                    </blockquote>
                    <div class="flex items-center gap-3 pt-4">
                        <span class="w-6 h-[1px] bg-primary/40"></span>
                        <p class="font-label text-[10px] uppercase tracking-[0.2em] font-bold text-on-surface-variant">
                            Facebook <span class="mx-2 opacity-30">|</span> Verified Experience
                        </p>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="space-y-6 border-l border-primary/20 pl-8 relative">
                    <div class="flex gap-1 text-primary mb-4">
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">star</span>
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">star</span>
                    </div>
                    <blockquote class="text-2xl font-serif italic text-on-surface leading-snug">
                        "Quiet luxury at its finest. My ritual for restoration."
                    </blockquote>
                    <div class="flex items-center gap-3 pt-4">
                        <span class="w-6 h-[1px] bg-primary/40"></span>
                        <p class="font-label text-[10px] uppercase tracking-[0.2em] font-bold text-on-surface-variant">
                            Google Review <span class="mx-2 opacity-30">|</span> 5.0 Rating
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- TEAM -->
    <section class="py-32 px-8 max-w-7xl mx-auto bg-[#FFECF0]">

        <div class="mb-24 text-center">

            <h2 class="text-5xl md:text-6xl font-serif italic text-on-surface">
                The Architects of Style
            </h2>

            <div class="h-px w-24 bg-primary mx-auto mt-8 mb-4"></div>

            <p class="text-on-surface-variant font-body uppercase tracking-[0.4em] text-xs font-semibold">
                A collective of visionaries
            </p>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-12 gap-y-24">

            <!-- MEMBER 1 -->
            <div class="group flex flex-col items-center md:items-start">
                <div class="aspect-[3/4] w-full overflow-hidden rounded-xl mb-8 shadow-sm">
                    <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-700"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuAOdbGUxKEZgHkExeeyQnWSBEu8CE7SgSJFGyKj2eDIly3KCKZtUr8IbxDIcp9fZ0eCIZDsqbj42RlyI8Dtm2Ra-f7NPCBImuqO10ARQVkr8Kt0VP9ro8GIHFk5pPfZqCFa5610EUfpxRhS_dCGmecXxRCphHJ7Hrth5qt2orovxOkr6Qjnm5uJp6d_pctePgXgPCIpvs5p5_ZZyqj8KDLkq8skXaO0k_OunYEvZ44c8c_QiwekdUWDapn4MbOJycOLVdCv4Xl5eGU" />
                </div>

                <div class="space-y-4 text-center md:text-left">
                    <h4 class="text-3xl font-serif italic">Elena Siba</h4>
                    <p class="text-primary text-xs uppercase font-bold">Creative Director & Founder</p>
                    <p class="text-sm font-light">
                        With over fifteen years in haute couture styling, Elena founded Sib Style to bridge the gap between runway aesthetics and personal wellness.
                    </p>
                </div>
            </div>

            <!-- MEMBER 2 -->
            <div class="group flex flex-col items-center md:items-start md:pt-12">
                <div class="aspect-[3/4] w-full overflow-hidden rounded-xl mb-8 shadow-sm">
                    <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-700"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuAOdbGUxKEZgHkExeeyQnWSBEu8CE7SgSJFGyKj2eDIly3KCKZtUr8IbxDIcp9fZ0eCIZDsqbj42RlyI8Dtm2Ra-f7NPCBImuqO10ARQVkr8Kt0VP9ro8GIHFk5pPfZqCFa5610EUfpxRhS_dCGmecXxRCphHJ7Hrth5qt2orovxOkr6Qjnm5uJp6d_pctePgXgPCIpvs5p5_ZZyqj8KDLkq8skXaO0k_OunYEvZ44c8c_QiwekdUWDapn4MbOJycOLVdCv4Xl5eGU" />
                </div>

                <div class="space-y-4 text-center md:text-left">
                    <h4 class="text-3xl font-serif italic">Julian Marc</h4>
                    <p class="text-primary text-xs uppercase font-bold">Master Colorist</p>
                    <p class="text-sm font-light">
                        Julian is an alchemist of light, specializing in bespoke balayage and corrective chemistry.
                    </p>
                </div>
            </div>

            <!-- MEMBER 3 -->
            <div class="group flex flex-col items-center md:items-start md:pt-24">
                <div class="aspect-[3/4] w-full overflow-hidden rounded-xl mb-8 shadow-sm">
                    <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-700"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuAOdbGUxKEZgHkExeeyQnWSBEu8CE7SgSJFGyKj2eDIly3KCKZtUr8IbxDIcp9fZ0eCIZDsqbj42RlyI8Dtm2Ra-f7NPCBImuqO10ARQVkr8Kt0VP9ro8GIHFk5pPfZqCFa5610EUfpxRhS_dCGmecXxRCphHJ7Hrth5qt2orovxOkr6Qjnm5uJp6d_pctePgXgPCIpvs5p5_ZZyqj8KDLkq8skXaO0k_OunYEvZ44c8c_QiwekdUWDapn4MbOJycOLVdCv4Xl5eGU" />
                </div>

                <div class="space-y-4 text-center md:text-left">
                    <h4 class="text-3xl font-serif italic">Sophia Chen</h4>
                    <p class="text-primary text-xs uppercase font-bold">Artisan Esthetician</p>
                    <p class="text-sm font-light">
                        Sophia focuses on skin health as a foundation for beauty through holistic and clinical techniques.
                    </p>
                </div>
            </div>

        </div>

    </section>

@endsection