@extends('frontend.layouts.app')

@section('content')

{{-- ===== HERO SECTION ===== --}}
<section
    class="relative bg-gradient-to-br from-stone-50 via-amber-50 to-stone-100 flex items-start overflow-hidden">

    {{-- Animated background blobs --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div
            style="position:absolute;width:500px;height:500px;background:#fde68a;border-radius:50%;top:-100px;right:-100px;filter:blur(80px);opacity:0.4;animation:blobPulse 8s ease-in-out infinite;">
        </div>
        <div
            style="position:absolute;width:400px;height:400px;background:#fef9c3;border-radius:50%;bottom:-80px;left:-80px;filter:blur(80px);opacity:0.4;animation:blobPulse 10s ease-in-out infinite -3s;">
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 sm:pt-10 lg:pt-12 pb-16 sm:pb-20 lg:pb-24 relative z-10 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            {{-- Left: Text --}}
            <div style="animation: fadeInUp 0.8s ease both;">
                <div
                    class="inline-flex items-center gap-2 bg-white border border-amber-200 shadow-sm rounded-full px-4 py-1.5 mb-6">
                    <span class="w-2 h-2 rounded-full bg-green-500" style="animation:pulse 2s infinite;"></span>
                    <span class="text-amber-800 text-sm font-semibold tracking-wide">100% Pure · Unrefined · Farm
                        Fresh</span>
                </div>

                <h1 class="text-5xl lg:text-7xl font-extrabold text-stone-900 leading-[1.05] mb-6">
                    The Gold Standard of
                    <span class="text-amber-600 relative inline-block">
                        Groundnut Oil
                        <svg class="absolute -bottom-2 left-0 w-full" viewBox="0 0 300 12" preserveAspectRatio="none">
                            <path d="M0,8 Q75,0 150,8 Q225,16 300,8" stroke="#f59e0b" stroke-width="3" fill="none"
                                stroke-linecap="round" />
                        </svg>
                    </span>
                </h1>

                <p class="text-lg text-stone-600 mb-10 max-w-lg leading-relaxed">
                    Experience the authentic taste and health benefits of traditional cold-pressed oil.
                    Unrefined, unbleached, and full of natural nutrients.
                </p>

                <div class="flex flex-wrap gap-4 mb-10">
                    <a href="{{ route('products.index') }}" class="btn-primary text-base py-3.5 px-8">Shop Now →</a>
                    <a href="{{ route('process') }}" class="btn-outline text-base py-3.5 px-8">Our Process</a>
                </div>

                <div class="flex flex-wrap gap-6 mb-8 sm:mb-10">
                    <div class="flex items-center gap-2 text-stone-600 text-sm font-medium">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        No Additives
                    </div>
                    <div class="flex items-center gap-2 text-stone-600 text-sm font-medium">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        Cold Pressed
                    </div>
                    <div class="flex items-center gap-2 text-stone-600 text-sm font-medium">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        Direct from Farm
                    </div>
                </div>
            </div>

            {{-- Right: Floating product image --}}
            <div class="flex justify-center lg:justify-end" style="animation: fadeInRight 1s ease 0.3s both;">
                <div class="relative">
                    <div class="absolute inset-0 rounded-[40%] bg-amber-200 blur-3xl opacity-30 scale-110"></div>
                    <div class="relative w-72 h-80 lg:w-96 lg:h-[440px] bg-gradient-to-br from-amber-50 via-yellow-100 to-amber-100 rounded-[40%] shadow-2xl border border-amber-200/60 flex items-center justify-center overflow-hidden"
                        style="animation:floatY 4s ease-in-out infinite;">
                        <img src="{{ asset('images/peanut.png') }}" alt="Amrutam Brand"
                            class="w-full h-full object-cover opacity-100 scale-105">
                    </div>
                    <div class="absolute -bottom-6 -left-8 bg-white rounded-2xl shadow-xl px-5 py-3 flex items-center gap-3"
                        style="animation: fadeInUp 0.6s ease 0.8s both;">
                        <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center text-lg">🌿
                        </div>
                        <div>
                            <p class="text-amber-600 font-bold text-sm">Cold Pressed</p>
                            <p class="text-stone-500 text-xs">Rich in Nutrients</p>
                        </div>
                    </div>
                    <div class="absolute -top-4 -right-8 bg-white rounded-2xl shadow-xl px-5 py-3 flex items-center gap-3"
                        style="animation: fadeInDown 0.6s ease 1s both;">
                        <div
                            class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center font-bold text-green-600 text-lg">
                            ✓</div>
                        <div>
                            <p class="text-stone-900 font-bold text-sm">100% Pure</p>
                            <p class="text-stone-500 text-xs">Zero Chemicals</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== STATS STRIP ===== --}}
<section class="py-7 sm:py-8 bg-stone-900 text-white border-t border-black/90 overflow-hidden">
    <div class="stats-marquee-track">
        <div class="stats-marquee-group">
            @if(!empty($activeMarqueeAd))
            @for($i = 0; $i < 4; $i++)
            <div class="stats-item text-center">
                @if(!empty($activeMarqueeAd->redirect_url))
                <a href="{{ $activeMarqueeAd->redirect_url }}"
                    class="block text-amber-300 hover:text-amber-200 font-semibold text-sm sm:text-base transition">
                    {{ $activeMarqueeAd->title }}
                </a>
                @else
                <span class="block text-amber-300 font-semibold text-sm sm:text-base">
                    {{ $activeMarqueeAd->title }}
                </span>
                @endif
            </div>
            @endfor
            @else
            <div class="stats-item text-center">
                <div class="text-2xl sm:text-3xl font-extrabold text-amber-400 mb-0.5">100%</div>
                <p class="text-stone-300 text-xs sm:text-sm font-medium">Pure & Natural</p>
            </div>
            <div class="stats-item text-center">
                <div class="text-2xl sm:text-3xl font-extrabold text-amber-400 mb-0.5">3</div>
                <p class="text-stone-300 text-xs sm:text-sm font-medium">Pack Sizes</p>
            </div>
            <div class="stats-item text-center">
                <div class="text-2xl sm:text-3xl font-extrabold text-amber-400 mb-0.5">0°C</div>
                <p class="text-stone-300 text-xs sm:text-sm font-medium">Extra Heat</p>
            </div>
            <div class="stats-item text-center">
                <div class="text-2xl sm:text-3xl font-extrabold text-amber-400 mb-0.5">&lt;45°</div>
                <p class="text-stone-300 text-xs sm:text-sm font-medium">Max Temp</p>
            </div>
            @endif
        </div>

        <div class="stats-marquee-group" aria-hidden="true">
            @if(!empty($activeMarqueeAd))
            @for($i = 0; $i < 4; $i++)
            <div class="stats-item text-center">
                @if(!empty($activeMarqueeAd->redirect_url))
                <a href="{{ $activeMarqueeAd->redirect_url }}" tabindex="-1"
                    class="block text-amber-300 font-semibold text-sm sm:text-base">
                    {{ $activeMarqueeAd->title }}
                </a>
                @else
                <span class="block text-amber-300 font-semibold text-sm sm:text-base">
                    {{ $activeMarqueeAd->title }}
                </span>
                @endif
            </div>
            @endfor
            @else
            <div class="stats-item text-center">
                <div class="text-2xl sm:text-3xl font-extrabold text-amber-400 mb-0.5">100%</div>
                <p class="text-stone-300 text-xs sm:text-sm font-medium">Pure & Natural</p>
            </div>
            <div class="stats-item text-center">
                <div class="text-2xl sm:text-3xl font-extrabold text-amber-400 mb-0.5">3</div>
                <p class="text-stone-300 text-xs sm:text-sm font-medium">Pack Sizes</p>
            </div>
            <div class="stats-item text-center">
                <div class="text-2xl sm:text-3xl font-extrabold text-amber-400 mb-0.5">0°C</div>
                <p class="text-stone-300 text-xs sm:text-sm font-medium">Extra Heat</p>
            </div>
            <div class="stats-item text-center">
                <div class="text-2xl sm:text-3xl font-extrabold text-amber-400 mb-0.5">&lt;45°</div>
                <p class="text-stone-300 text-xs sm:text-sm font-medium">Max Temp</p>
            </div>
            @endif
        </div>
    </div>
</section>

{{-- ===== PRODUCTS SECTION ===== --}}
<section class="pt-10 sm:pt-12 lg:pt-14 pb-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-amber-600 font-bold tracking-widest uppercase text-sm block mb-3">Our Range</span>
            <h2 class="text-4xl md:text-5xl font-bold text-stone-900 mb-4 font-serif">Premium Offerings</h2>
            <div class="w-16 h-1 bg-amber-500 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($products ?? [] as $product)
            <div
                class="bg-stone-50 rounded-3xl overflow-hidden border border-stone-100 shadow-sm hover:shadow-xl transition-all duration-500 group">
                <div
                    class="h-56 bg-gradient-to-br from-amber-100 to-yellow-50 flex items-center justify-center overflow-hidden p-4">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                        class="h-full w-full object-contain group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="p-6">
                    <span class="inline-block bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-md mb-3">{{
                        $product->size }}</span>
                    <h3 class="text-lg font-bold text-stone-900 mb-1">{{ $product->name }}</h3>
                    <p class="text-stone-500 text-sm mb-4 line-clamp-2">{{ $product->description }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-extrabold text-amber-600">₹{{ number_format($product->price)
                            }}</span>
                        <a href="{{ route('products.show', $product) }}"
                            class="text-sm font-bold text-stone-900 hover:text-amber-600 transition flex items-center gap-1">
                            Details <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12 mb-10 sm:mb-12">
            <a href="{{ route('products.index') }}" class="btn-outline">View All Products</a>
        </div>
    </div>
</section>

{{-- ===== WHY COLD PRESSED ===== --}}
<section class="py-16 bg-gradient-to-br from-stone-800 to-stone-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="rounded-3xl overflow-hidden shadow-2xl">
                <img src="{{ asset('images/about-heritage.png') }}" alt="Amrutam Brand"
                    class="w-full h-96 object-cover">
            </div>
            <div>
                <span class="text-amber-400 font-bold tracking-widest uppercase text-sm block mb-4">Why Choose Us</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-6 font-serif text-white">Why Cold Pressed?</h2>
                <p class="text-stone-200 text-lg mb-10 leading-relaxed">
                    Unlike commercial refined oils, our cold-pressed process extracts oil at room temperature,
                    preserving natural antioxidants, rich aroma, and essential fatty acids.
                </p>

                <ul class="space-y-6">
                    <li class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 rounded-2xl bg-amber-500/20 border border-amber-500/30 flex-shrink-0 flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold mb-1 text-white">Heart Healthy</h4>
                            <p class="text-stone-200">Zero trans fats and high in mono-unsaturated fatty acids.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 rounded-2xl bg-amber-500/20 border border-amber-500/30 flex-shrink-0 flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold mb-1 text-white">Rich Aroma & Flavor</h4>
                            <p class="text-stone-200">Retains the authentic nutty flavor that enhances every dish.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 rounded-2xl bg-amber-500/20 border border-amber-500/30 flex-shrink-0 flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold mb-1 text-white">Zero Chemicals</h4>
                            <p class="text-stone-200">No solvents, bleaching, or deodorizing agents. Ever.</p>
                        </div>
                    </li>
                </ul>

                <div class="mt-10">
                    <a href="{{ route('why-cold-pressed') }}"
                        class="text-amber-400 font-bold hover:text-amber-300 transition inline-flex items-center gap-2">
                        Read Full Story
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== CTA ===== --}}
<section class="py-16 bg-amber-600 text-white text-center relative overflow-hidden">
    <div class="absolute -top-20 -right-20 w-80 h-80 bg-amber-400 rounded-full blur-3xl opacity-40 pointer-events-none">
    </div>
    <div
        class="absolute -bottom-20 -left-20 w-80 h-80 bg-amber-700 rounded-full blur-3xl opacity-40 pointer-events-none">
    </div>
    <div class="max-w-4xl mx-auto px-4 relative z-10">
        <h2 class="text-4xl md:text-6xl font-extrabold font-serif mb-6 text-white">
            Experience Purity Direct from Manufacturer
        </h2>
        <p class="text-xl mb-10 text-amber-100 max-w-2xl mx-auto">
            Order today and taste the authentic difference in every drop.
        </p>
        <a href="{{ route('contact') }}"
            class="inline-block bg-white text-amber-700 hover:bg-amber-50 font-extrabold py-4 px-12 rounded-2xl text-lg shadow-2xl transition-all duration-300 transform hover:scale-105">
            Request an Order
        </a>
    </div>
</section>

@if(!empty($activePopupAd))
<div x-data="{
        open: false,
        closeAndRemember() {
            this.open = false;
        }
    }"
    x-init="
        setTimeout(() => open = true, 350);
    "
    x-show="open"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 flex items-center justify-center p-4 sm:p-6"
    style="display: none; z-index: 2147483647;"
    >
    <div class="absolute inset-0 bg-black/65 backdrop-blur-[3px]" style="z-index: 2147483646;" @click="closeAndRemember()"></div>

    <div
        class="relative w-full max-w-md bg-white rounded-3xl overflow-hidden shadow-2xl border border-stone-200"
        style="z-index: 2147483647;"
        @click.stop
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95 translate-y-3"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 translate-y-2">
        <button type="button"
            class="no-magnetic absolute z-20 w-9 h-9 rounded-full text-white shadow-sm flex items-center justify-center transition"
            style="top: 12px; right: 12px; background-color: #ef4444;"
            onmouseover="this.style.backgroundColor='#dc2626'"
            onmouseout="this.style.backgroundColor='#ef4444'"
            @click="closeAndRemember()"
            aria-label="Close advertisement popup">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        @if($activePopupAd->redirect_url && $activePopupAd->image)
        <a href="{{ $activePopupAd->redirect_url }}" class="no-magnetic block">
            <div class="w-full h-52 sm:h-56 bg-gradient-to-br from-amber-50 to-stone-100 p-4 sm:p-5">
                <img src="{{ asset('storage/' . $activePopupAd->image) }}" alt="{{ $activePopupAd->title }}"
                    class="w-full h-full object-contain">
            </div>
        </a>
        @elseif($activePopupAd->image)
        <div class="w-full h-52 sm:h-56 bg-gradient-to-br from-amber-50 to-stone-100 p-4 sm:p-5">
            <img src="{{ asset('storage/' . $activePopupAd->image) }}" alt="{{ $activePopupAd->title }}"
                class="w-full h-full object-contain">
        </div>
        @endif

        <div class="p-5 sm:p-6">
            <h3 class="text-xl sm:text-2xl font-bold text-stone-900 leading-tight pr-8">{{ $activePopupAd->title }}</h3>
            @if($activePopupAd->description)
            <p class="mt-2 text-stone-600 text-sm sm:text-base leading-relaxed">{{ $activePopupAd->description }}</p>
            @endif

            @if($activePopupAd->button_text && $activePopupAd->redirect_url)
            <a href="{{ $activePopupAd->redirect_url }}"
                class="no-magnetic inline-flex mt-5 bg-amber-500 hover:bg-amber-600 text-white font-bold py-2.5 px-6 rounded-xl transition shadow-sm">
                {{ $activePopupAd->button_text }}
            </a>
            @endif
        </div>
    </div>
</div>
@endif

@endsection

@push('scripts')
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(60px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes floatY {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-18px);
        }
    }

    @keyframes blobPulse {

        0%,
        100% {
            transform: scale(1) translate(0, 0);
        }

        50% {
            transform: scale(1.1) translate(20px, -20px);
        }
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.4;
        }
    }

    @keyframes statsMarquee {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-100vw);
        }
    }

    .stats-marquee-track {
        display: flex;
        animation: statsMarquee 20s linear infinite;
        will-change: transform;
    }

    .stats-marquee-group {
        display: flex;
        align-items: center;
        justify-content: space-around;
        gap: 1.5rem;
        width: 100vw;
        flex-shrink: 0;
        padding: 0 1.25rem;
    }

    .stats-item {
        min-width: 120px;
    }

    @media (min-width: 640px) {
        .stats-marquee-group {
            gap: 2rem;
        }

        .stats-item {
            min-width: 170px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .stats-marquee-track {
            animation: none;
        }
    }
</style>
@endpush
