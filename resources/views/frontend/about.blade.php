@extends('frontend.layouts.app')

@section('title', 'About Us | Amrutam Ground Nut Oil')

@section('content')
<div class="bg-[#f8f5ef] pb-12 sm:pb-14 lg:pb-20" style="padding-top: 12px;">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="relative mb-10 text-center fade-in-up sm:mb-12 lg:mb-16" style="padding-top: 24px; padding-bottom: 24px;">
            <div class="absolute inset-0 -z-10 overflow-hidden opacity-60 pointer-events-none">
                <div class="absolute top-0 right-1/4 h-64 w-64 rounded-full bg-amber-100 opacity-60 blur-3xl"></div>
                <div class="absolute bottom-0 left-1/4 h-48 w-48 rounded-full bg-stone-200 opacity-60 blur-2xl"></div>
            </div>

            <div class="relative z-10 mx-auto max-w-3xl px-4">
                <span class="mb-4 inline-flex items-center rounded-full border border-amber-200 bg-white/80 px-4 py-2 text-xs font-semibold uppercase tracking-[0.32em] text-amber-700 shadow-sm backdrop-blur">
                    About Amrutam
                </span>

                <h1 class="mb-5 font-serif text-4xl font-extrabold leading-tight tracking-tight text-stone-900 sm:mb-8 sm:text-5xl md:text-6xl lg:text-7xl">
                    Our Heritage <span class="relative inline-block italic text-amber-600">
                        &amp; Promise
                        <svg class="absolute left-0 -bottom-2 w-full" viewBox="0 0 300 12" preserveAspectRatio="none">
                            <path d="M0,8 Q75,0 150,8 Q225,16 300,8" stroke="#f59e0b" stroke-width="3" fill="none" stroke-linecap="round" />
                        </svg>
                    </span>
                </h1>

                <p class="mx-auto max-w-2xl text-base font-medium leading-relaxed text-stone-600 sm:text-lg">
                    A legacy of purity, crafted through generations of traditional wood-pressing methods to bring you
                    the finest groundnut oil.
                </p>
            </div>
        </div>

        <div class="relative overflow-hidden rounded-[2rem] border border-amber-100/80 bg-white/90 p-5 shadow-[0_24px_70px_rgba(120,90,24,0.10)] backdrop-blur-sm sm:p-8 lg:p-10">
            <div class="pointer-events-none absolute inset-x-0 top-0 h-40 bg-gradient-to-b from-amber-50 via-transparent to-transparent"></div>

            <div class="relative grid grid-cols-1 items-center gap-10 lg:grid-cols-[minmax(0,1.02fr)_minmax(0,1fr)] lg:gap-16">
                <div class="fade-in-left">
                    <div class="mx-auto w-full max-w-xl">
                        <div class="relative overflow-hidden rounded-[2rem] border border-white/80 bg-stone-100 shadow-[0_30px_60px_rgba(28,25,23,0.16)] transition-transform duration-500 hover:scale-[1.01]">
                            <img src="{{ asset('images/about-heritage.png') }}" alt="Farming Heritage"
                                class="h-72 w-full object-cover sm:h-[26rem] lg:h-[34rem]">
                            <div class="absolute inset-0 bg-gradient-to-t from-stone-950/20 via-transparent to-amber-100/10"></div>
                        </div>

                        <div class="mt-5 flex items-center justify-between gap-4 rounded-[1.5rem] border border-amber-100 bg-[#fffaf1] px-5 py-4 shadow-[0_14px_30px_rgba(217,119,6,0.12)] sm:px-6">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-stone-500">Purity standard</p>
                                <p class="mt-1 text-lg font-semibold text-stone-900 sm:text-xl">Naturally cold-pressed</p>
                            </div>

                            <div class="flex h-20 w-20 shrink-0 items-center justify-center rounded-full border-4 border-amber-100 bg-white text-center shadow-sm sm:h-24 sm:w-24">
                                <div>
                                    <span class="block text-2xl font-bold leading-none text-amber-600 sm:text-3xl">100%</span>
                                    <span class="mt-1 block text-[10px] font-semibold uppercase tracking-[0.28em] text-stone-500 sm:text-[11px]">Natural</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fade-in-right">
                    <div class="inline-flex items-center rounded-full bg-stone-900 px-4 py-2 text-xs font-semibold uppercase tracking-[0.28em] text-white">
                        Since generations
                    </div>

                    <h3 class="mt-5 mb-5 font-serif text-3xl font-bold leading-tight text-[#1c1917] sm:mb-6 sm:text-4xl">
                        Roots in Tradition. Crafted for Health.
                    </h3>

                    <div class="space-y-4 text-base leading-relaxed text-[#57534e] sm:space-y-6 sm:text-lg">
                        <p>
                            Welcome to <strong>Amrutam Ground Nut Oil</strong>, where tradition meets purity. For
                            generations, we have perfected the art of extracting oil using the timeless <em>Kachi Ghani
                                (cold pressing)</em> method.
                        </p>
                        <p>
                            Unlike highly refined commercial oils that use heat and chemicals, our oil is cold-pressed
                            straight from farm-fresh, carefully selected groundnuts. This gentle extraction process ensures
                            that all natural nutrients, antioxidants, and the authentic nutty aroma are fully preserved.
                        </p>
                        <p>
                            Our mission is simple: To bring back the traditional goodness of pure oil to modern kitchens.
                            We sell directly to our community, ensuring zero adulteration, premium quality, and a taste
                            that reminds you of home.
                        </p>
                    </div>

                    <div class="mt-8 grid gap-4 border-t border-amber-200 pt-8 sm:mt-10 sm:grid-cols-2 sm:pt-10">
                        <div class="rounded-[1.5rem] border border-stone-200 bg-stone-50 px-5 py-4">
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-amber-700">Traditional method</p>
                            <p class="mt-2 text-base text-stone-700">Wood-pressed extraction that protects aroma, flavor, and nutrients.</p>
                        </div>

                        <div class="rounded-[1.5rem] border border-stone-200 bg-stone-50 px-5 py-4">
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-amber-700">Direct sourcing</p>
                            <p class="mt-2 text-base text-stone-700">Carefully selected groundnuts from trusted local farming communities.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        gsap.from(".fade-in-up", { y: 30, opacity: 0, duration: 1, ease: "power3.out" });
        gsap.from(".fade-in-left", { x: -50, opacity: 0, duration: 1, delay: 0.3, ease: "power3.out" });
        gsap.from(".fade-in-right", { x: 50, opacity: 0, duration: 1, delay: 0.5, ease: "power3.out" });
    });
</script>
@endpush
