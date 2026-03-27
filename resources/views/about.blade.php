@extends('layouts.app')

@section('content')

<!-- HERO: OUR STORY -->
<section class="px-8 py-20 md:py-32 max-w-7xl mx-auto overflow-hidden">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center">

        <div class="md:col-span-7 space-y-8">

            <span class="text-primary font-label tracking-[0.3em] uppercase text-xs font-bold">
                The Heritage
            </span>

            <h1 class="text-5xl md:text-7xl font-serif text-on-surface leading-tight italic">
                The Curated <br /> Sanctuary.
            </h1>

            <div class="max-w-xl space-y-6">
                <p class="text-lg text-on-surface-variant font-body leading-relaxed">
                    Founded on the principle that beauty is a sensory dialogue, Sib Style Beauty Lounge emerged as a rebellion against the clinical and the hurried. Our vision was to create a space where time slows down—a boutique environment that honors the art of the individual.
                </p>

                <p class="text-lg text-on-surface-variant font-body leading-relaxed">
                    Every curve of our interiors, every botanical essence in our treatments, and every rhythmic stroke of our stylists is designed to transport you from the noise of the world into a realm of intentional grace.
                </p>
            </div>

        </div>

        <div class="md:col-span-5 relative">

            <div class="aspect-[4/5] bg-surface-container rounded-xl overflow-hidden shadow-2xl">
                <img
                    class="w-full h-full object-cover grayscale-[20%] hover:scale-105 transition-transform duration-700"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAOdbGUxKEZgHkExeeyQnWSBEu8CE7SgSJFGyKj2eDIly3KCKZtUr8IbxDIcp9fZ0eCIZDsqbj42RlyI8Dtm2Ra-f7NPCBImuqO10ARQVkr8Kt0VP9ro8GIHFk5pPfZqCFa5610EUfpxRhS_dCGmecXxRCphHJ7Hrth5qt2orovxOkr6Qjnm5uJp6d_pctePgXgPCIpvs5p5_ZZyqj8KDLkq8skXaO0k_OunYEvZ44c8c_QiwekdUWDapn4MbOJycOLVdCv4Xl5eGU"
                />
            </div>

            <div class="absolute -bottom-8 -left-8 bg-secondary-fixed p-8 rounded-xl hidden lg:block shadow-lg">
                <p class="font-serif italic text-2xl text-on-secondary-fixed">
                    Est. 2012
                </p>
            </div>

        </div>

    </div>
</section>

<!-- VALUES -->
<section class="bg-surface-container-low py-24 px-8">
    <div class="max-w-7xl mx-auto">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-16">

            <div class="space-y-4 border-l border-outline-variant/30 pl-8">
                <span class="text-secondary font-bold text-2xl italic font-serif">01</span>
                <h3 class="text-xl font-serif font-bold text-primary">Intentional Care</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed">
                    We don't just provide services; we curate experiences tailored to your unique biological and aesthetic needs.
                </p>
            </div>

            <div class="space-y-4 border-l border-outline-variant/30 pl-8 md:mt-12">
                <span class="text-secondary font-bold text-2xl italic font-serif">02</span>
                <h3 class="text-xl font-serif font-bold text-primary">Artisan Excellence</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed">
                    Our stylists are masters of craft, blending classic heritage techniques with modern editorial innovation.
                </p>
            </div>

            <div class="space-y-4 border-l border-outline-variant/30 pl-8 md:mt-24">
                <span class="text-secondary font-bold text-2xl italic font-serif">03</span>
                <h3 class="text-xl font-serif font-bold text-primary">Sensory Calm</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed">
                    From the acoustics of our lounge to the weight of our linens, every detail is tuned for your tranquility.
                </p>
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
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAOdbGUxKEZgHkExeeyQnWSBEu8CE7SgSJFGyKj2eDIly3KCKZtUr8IbxDIcp9fZ0eCIZDsqbj42RlyI8Dtm2Ra-f7NPCBImuqO10ARQVkr8Kt0VP9ro8GIHFk5pPfZqCFa5610EUfpxRhS_dCGmecXxRCphHJ7Hrth5qt2orovxOkr6Qjnm5uJp6d_pctePgXgPCIpvs5p5_ZZyqj8KDLkq8skXaO0k_OunYEvZ44c8c_QiwekdUWDapn4MbOJycOLVdCv4Xl5eGU"/>
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
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAOdbGUxKEZgHkExeeyQnWSBEu8CE7SgSJFGyKj2eDIly3KCKZtUr8IbxDIcp9fZ0eCIZDsqbj42RlyI8Dtm2Ra-f7NPCBImuqO10ARQVkr8Kt0VP9ro8GIHFk5pPfZqCFa5610EUfpxRhS_dCGmecXxRCphHJ7Hrth5qt2orovxOkr6Qjnm5uJp6d_pctePgXgPCIpvs5p5_ZZyqj8KDLkq8skXaO0k_OunYEvZ44c8c_QiwekdUWDapn4MbOJycOLVdCv4Xl5eGU"/>
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
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAOdbGUxKEZgHkExeeyQnWSBEu8CE7SgSJFGyKj2eDIly3KCKZtUr8IbxDIcp9fZ0eCIZDsqbj42RlyI8Dtm2Ra-f7NPCBImuqO10ARQVkr8Kt0VP9ro8GIHFk5pPfZqCFa5610EUfpxRhS_dCGmecXxRCphHJ7Hrth5qt2orovxOkr6Qjnm5uJp6d_pctePgXgPCIpvs5p5_ZZyqj8KDLkq8skXaO0k_OunYEvZ44c8c_QiwekdUWDapn4MbOJycOLVdCv4Xl5eGU"/>
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