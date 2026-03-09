@extends('frontend.layouts.app')

@section('title', 'About Us | Amrutam Ground Nut Oil')

@section('content')
<div class="bg-[#fafaf9] py-8 sm:py-12 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Refined Premium Header -->
        <div class="relative py-8 sm:py-10 lg:py-16 mb-8 sm:mb-10 lg:mb-12 text-center fade-in-up">
            {{-- Background Accent Blobs (matching home page) --}}
            <div class="absolute inset-0 pointer-events-none -z-10 overflow-hidden opacity-40">
                <div class="absolute top-0 right-1/4 w-64 h-64 bg-amber-100 rounded-full blur-3xl opacity-50"></div>
                <div class="absolute bottom-0 left-1/4 w-48 h-48 bg-stone-100 rounded-full blur-2xl opacity-50"></div>
            </div>

            <div class="relative z-10 max-w-3xl mx-auto px-4">
                <h1
                    class="text-3xl sm:text-4xl md:text-6xl lg:text-7xl font-extrabold text-stone-900 leading-tight mb-5 sm:mb-8 font-serif tracking-tight">
                    Our Heritage <span class="text-amber-600 italic relative inline-block">
                        &amp; Promise
                        <svg class="absolute -bottom-2 left-0 w-full" viewBox="0 0 300 12" preserveAspectRatio="none">
                            <path d="M0,8 Q75,0 150,8 Q225,16 300,8" stroke="#f59e0b" stroke-width="3" fill="none"
                                stroke-linecap="round" />
                        </svg>
                    </span>
                </h1>

                <p class="text-base sm:text-lg text-stone-600 font-medium max-w-xl mx-auto leading-relaxed">
                    A legacy of purity, crafted through generations of traditional wood-pressing methods to bring you
                    the finest groundnut oil.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 sm:gap-12 lg:gap-16 items-center">

            <!-- Image Section -->
            <div class="relative flex justify-center fade-in-left">
                <div
                    class="relative w-full max-w-md h-72 sm:h-96 lg:h-[500px] rounded-2xl overflow-hidden shadow-2xl border-4 border-white transition-transform duration-500 hover:scale-[1.02]">
                    <img src="{{ asset('images/about-heritage.png') }}" alt="Farming Heritage"
                        class="w-full h-full object-cover">
                    {{-- Using a very light overlay for better visibility --}}
                    <div class="absolute inset-0 bg-amber-900/10 mix-blend-overlay"></div>
                </div>
                <!-- Decorative emblem -->
                <div
                    class="absolute -bottom-4 -right-2 sm:-bottom-6 sm:-right-6 lg:-right-10 bg-white p-3 sm:p-4 rounded-full shadow-xl w-24 h-24 sm:w-32 sm:h-32 flex items-center justify-center border-4 border-amber-50">
                    <div class="text-center">
                        <span class="block text-xl sm:text-2xl font-bold text-amber-600">100%</span>
                        <span
                            class="block text-[10px] sm:text-xs font-semibold text-[#78716c] uppercase tracking-widest">Natural</span>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="fade-in-right">
                <h3 class="text-2xl sm:text-3xl font-serif font-bold text-[#1c1917] mb-5 sm:mb-6">Roots in Tradition.
                    Crafted for Health.
                </h3>

                <div class="space-y-4 sm:space-y-6 text-base sm:text-lg text-[#57534e] leading-relaxed">
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
                        Our mission is simple: To bring back the traditional goodness of pure oil to modern kitchens. We
                        sell directly to our community, ensuring zero adulteration, premium quality, and a taste that
                        reminds you of home.
                    </p>
                </div>

                <div class="mt-8 sm:mt-10 pt-8 sm:pt-10 border-t border-amber-900/50">
                    <div class="flex items-center gap-4 sm:gap-6">
                        <div class="flex -space-x-4">
                            <img class="w-12 h-12 rounded-full border-2 border-white shadow-sm"
                                src="https://ui-avatars.com/api/?name=Farmer+1&background=f59e0b&color=fff" alt="">
                            <img class="w-12 h-12 rounded-full border-2 border-white shadow-sm"
                                src="https://ui-avatars.com/api/?name=Farmer+2&background=d97706&color=fff" alt="">
                        </div>
                        <div>
                            <p class="font-bold text-[#1c1917]">Direct from Farmers</p>
                            <p class="text-sm text-[#78716c]">Supporting local agriculture</p>
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
