@extends('frontend.layouts.app')

@section('title', 'Our Process — Traditional cold Pressed Oil | Amrutam Ground Nut Oil')

@section('content')

{{-- Hero --}}
<section class="relative min-h-[500px] flex items-center justify-center py-24 text-center overflow-hidden bg-stone-900">
    {{-- Background Image & Overlay --}}
    <div class="absolute inset-0 bg-stone-900/60 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-stone-900 via-transparent to-stone-900/40"></div>
    <div class="absolute inset-0 bg-amber-900/20 mix-blend-overlay"></div>

    <div class="max-w-4xl mx-auto px-4 relative z-10">
        <span
            class="inline-block px-4 py-1.5 bg-amber-500/10 border border-amber-500/20 rounded-full text-amber-400 font-black tracking-[0.2em] uppercase text-xs mb-6 shadow-xl backdrop-blur-sm">
            Our Traditional Legacy
        </span>
        <h1 class="text-5xl md:text-7xl font-black font-serif mb-6 leading-tight text-white drop-shadow-2xl">
            The Art of <br><span class="text-amber-500 italic">cold Pressing</span>
        </h1>
        <p class="text-xl text-stone-200 max-w-2xl mx-auto leading-relaxed font-medium drop-shadow-lg">
            A slow, heat-free, chemical-free craft that has been honoured in Indian households for centuries.
            Every drop of Amrutam oil carries this legacy of purity.
        </p>
    </div>
</section>

{{-- Key Facts Strip --}}
<section class="bg-amber-500 text-white py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
            <div>
                <div class="text-2xl font-extrabold">Below 45°C</div>
                <p class="text-amber-100 text-sm">Extraction Temperature</p>
            </div>
            <div>
                <div class="text-2xl font-extrabold">0 Chemicals</div>
                <p class="text-amber-100 text-sm">Zero Solvents Used</p>
            </div>
            <div>
                <div class="text-2xl font-extrabold">100% Pure</div>
                <p class="text-amber-100 text-sm">Nothing Added</p>
            </div>
            <div>
                <div class="text-2xl font-extrabold">Traditional</div>
                <p class="text-amber-100 text-sm">Kachi Ghani Method</p>
            </div>
        </div>
    </div>
</section>

{{-- Process Steps --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-stone-900 font-serif mb-4">From Farm to Bottle</h2>
            <p class="text-stone-500 text-lg max-w-2xl mx-auto">Every step in our process is designed to preserve
                nature's goodness.</p>
        </div>

        {{-- Steps Container --}}
        <div class="space-y-24">

            {{-- Step 1 --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div
                        class="bg-amber-50 rounded-3xl overflow-hidden shadow-xl border border-amber-100 h-80 flex items-center justify-center">
                        <div class="text-center p-8">
                            <div
                                class="w-32 h-32 mx-auto mb-6 bg-amber-500 rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="text-amber-800 font-bold text-lg font-serif">Farm-Fresh Peanuts</p>
                            <p class="text-amber-700 text-sm mt-2">A-grade quality, sun-dried</p>
                        </div>
                    </div>
                    <div
                        class="absolute -top-5 -left-5 w-14 h-14 bg-stone-900 text-white rounded-2xl flex items-center justify-center font-extrabold text-2xl shadow-lg">
                        1</div>
                </div>
                <div class="lg:pl-8">
                    <span class="text-amber-600 font-bold text-sm uppercase tracking-widest block mb-3">Step One</span>
                    <h3 class="text-3xl font-bold text-stone-900 font-serif mb-4">Sourcing Premium Peanuts</h3>
                    <p class="text-stone-600 text-lg leading-relaxed mb-6">We partner with trusted local farmers across
                        India to source only the finest A-grade groundnuts. Each batch is sun-dried to the ideal
                        moisture level and inspected before entering our facility.</p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3"><span
                                class="w-6 h-6 bg-amber-100 text-amber-700 rounded-full flex items-center justify-center flex-shrink-0 font-bold text-xs mt-0.5">✓</span><span
                                class="text-stone-600">Direct partnership with local Indian farmers</span></li>
                        <li class="flex items-start gap-3"><span
                                class="w-6 h-6 bg-amber-100 text-amber-700 rounded-full flex items-center justify-center flex-shrink-0 font-bold text-xs mt-0.5">✓</span><span
                                class="text-stone-600">Sun-dried for optimal moisture content</span></li>
                        <li class="flex items-start gap-3"><span
                                class="w-6 h-6 bg-amber-100 text-amber-700 rounded-full flex items-center justify-center flex-shrink-0 font-bold text-xs mt-0.5">✓</span><span
                                class="text-stone-600">Rigorous A-grade quality selection only</span></li>
                    </ul>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="lg:order-2 relative">
                    <div
                        class="bg-stone-50 rounded-3xl overflow-hidden shadow-xl border border-stone-200 h-80 flex items-center justify-center">
                        <div class="text-center p-8">
                            <div
                                class="w-32 h-32 mx-auto mb-6 bg-stone-800 rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-16 h-16 text-amber-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <p class="text-stone-800 font-bold text-lg font-serif">Cleaned to Perfection</p>
                            <p class="text-stone-500 text-sm mt-2">Quality-checked at every step</p>
                        </div>
                    </div>
                    <div
                        class="absolute -top-5 -right-5 w-14 h-14 bg-amber-500 text-white rounded-2xl flex items-center justify-center font-extrabold text-2xl shadow-lg">
                        2</div>
                </div>
                <div class="lg:order-1 lg:pr-8">
                    <span class="text-amber-600 font-bold text-sm uppercase tracking-widest block mb-3">Step Two</span>
                    <h3 class="text-3xl font-bold text-stone-900 font-serif mb-4">Cleaning &amp; Sorting</h3>
                    <p class="text-stone-600 text-lg leading-relaxed mb-6">The selected peanuts go through a thorough
                        multi-stage cleaning process. Every nut is sorted and any that don't meet our standards are
                        removed. Only the purest kernels move forward — no compromises.</p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3"><span
                                class="w-6 h-6 bg-amber-100 text-amber-700 rounded-full flex items-center justify-center flex-shrink-0 font-bold text-xs mt-0.5">✓</span><span
                                class="text-stone-600">Multi-stage cleaning removes all impurities</span></li>
                        <li class="flex items-start gap-3"><span
                                class="w-6 h-6 bg-amber-100 text-amber-700 rounded-full flex items-center justify-center flex-shrink-0 font-bold text-xs mt-0.5">✓</span><span
                                class="text-stone-600">Shelled to expose the pure oil-rich kernel</span></li>
                        <li class="flex items-start gap-3"><span
                                class="w-6 h-6 bg-amber-100 text-amber-700 rounded-full flex items-center justify-center flex-shrink-0 font-bold text-xs mt-0.5">✓</span><span
                                class="text-stone-600">Final visual inspection before pressing</span></li>
                    </ul>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div
                        class="bg-gradient-to-br from-amber-400 to-amber-600 rounded-3xl overflow-hidden shadow-xl h-80 flex items-center justify-center">
                        <div class="text-center p-8">
                            <div
                                class="w-32 h-32 mx-auto mb-6 bg-white bg-opacity-20 rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                            </div>
                            <p class="text-white font-bold text-xl font-serif">Below 45°C</p>
                            <p class="text-amber-100 text-sm mt-2">Traditional Kachi Ghani Press</p>
                        </div>
                    </div>
                    <div
                        class="absolute -top-5 -left-5 w-14 h-14 bg-stone-900 text-white rounded-2xl flex items-center justify-center font-extrabold text-2xl shadow-lg">
                        3</div>
                </div>
                <div class="lg:pl-8">
                    <span class="text-amber-600 font-bold text-sm uppercase tracking-widest block mb-3">Step Three — The
                        Heart of the Process</span>
                    <h3 class="text-3xl font-bold text-stone-900 font-serif mb-4">cold Pressing (Kachi Ghani)</h3>
                    <p class="text-stone-600 text-lg leading-relaxed mb-6">The cleaned kernels are pressed in our
                        traditional wooden ghani at a slow, gentle speed. <strong class="text-stone-800">No external
                            heat is applied</strong> — the temperature stays below 45°C throughout. This preserves all
                        natural vitamins, antioxidants, and the authentic nutty aroma.</p>
                    <div class="bg-amber-50 border border-amber-200 rounded-2xl p-5">
                        <p class="text-amber-800 font-bold text-sm mb-2">Why this matters:</p>
                        <p class="text-amber-700 text-sm leading-relaxed">Heat destroys Vitamin E, antioxidants, and
                            natural flavour. By keeping temperature below 45°C, our oil retains 100% of its nutritional
                            goodness — unlike refined oils processed at 200°C+.</p>
                    </div>
                </div>
            </div>

            {{-- Step 4 --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="lg:order-2 relative">
                    <div
                        class="bg-gradient-to-br from-yellow-50 to-amber-100 rounded-3xl overflow-hidden shadow-xl border border-amber-200 h-80 flex items-center justify-center">
                        <div class="text-center p-8">
                            <div
                                class="w-32 h-32 mx-auto mb-6 rounded-full bg-gradient-to-br from-yellow-300 via-amber-400 to-amber-600 shadow-2xl flex items-center justify-center">
                                <svg class="w-14 h-14 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z" />
                                </svg>
                            </div>
                            <p class="text-amber-900 font-bold text-xl font-serif">Pure Golden Oil</p>
                            <p class="text-amber-700 text-sm mt-2">No bleaching. No deodorizing.</p>
                        </div>
                    </div>
                    <div
                        class="absolute -top-5 -right-5 w-14 h-14 bg-amber-500 text-white rounded-2xl flex items-center justify-center font-extrabold text-2xl shadow-lg">
                        4</div>
                </div>
                <div class="lg:order-1 lg:pr-8">
                    <span class="text-amber-600 font-bold text-sm uppercase tracking-widest block mb-3">Step Four</span>
                    <h3 class="text-3xl font-bold text-stone-900 font-serif mb-4">Natural Filtration</h3>
                    <p class="text-stone-600 text-lg leading-relaxed mb-6">The freshly pressed oil settles naturally for
                        several days. Fine natural sediment sinks and the oil is cloth-filtered — no chemical
                        clarifiers, no bleach, no deodorizing. The result is the pure, golden, aromatic oil that reaches
                        your kitchen.</p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3"><span
                                class="w-6 h-6 bg-amber-100 text-amber-700 rounded-full flex items-center justify-center flex-shrink-0 font-bold text-xs mt-0.5">✓</span><span
                                class="text-stone-600">Gravity-settled naturally for several days</span></li>
                        <li class="flex items-start gap-3"><span
                                class="w-6 h-6 bg-amber-100 text-amber-700 rounded-full flex items-center justify-center flex-shrink-0 font-bold text-xs mt-0.5">✓</span><span
                                class="text-stone-600">Cloth-filtered — zero chemical clarifiers</span></li>
                        <li class="flex items-start gap-3"><span
                                class="w-6 h-6 bg-amber-100 text-amber-700 rounded-full flex items-center justify-center flex-shrink-0 font-bold text-xs mt-0.5">✓</span><span
                                class="text-stone-600">Golden colour retained — not bleached away</span></li>
                    </ul>
                </div>
            </div>

            {{-- Step 5 --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div
                        class="bg-stone-900 rounded-3xl overflow-hidden shadow-xl h-80 flex items-center justify-center">
                        <div class="text-center p-8">
                            <div
                                class="w-32 h-32 mx-auto mb-6 bg-amber-500 rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <p class="text-white font-bold text-xl font-serif">1 KG &middot; 5 KG &middot; 15 KG</p>
                            <p class="text-stone-400 text-sm mt-2">Sealed fresh for your kitchen</p>
                        </div>
                    </div>
                    <div
                        class="absolute -top-5 -left-5 w-14 h-14 bg-amber-500 text-white rounded-2xl flex items-center justify-center font-extrabold text-2xl shadow-lg">
                        5</div>
                </div>
                <div class="lg:pl-8">
                    <span class="text-amber-600 font-bold text-sm uppercase tracking-widest block mb-3">Step Five</span>
                    <h3 class="text-3xl font-bold text-stone-900 font-serif mb-4">Bottling &amp; Quality Check</h3>
                    <p class="text-stone-600 text-lg leading-relaxed mb-6">The pure oil is quality-tested for aroma,
                        acidity, and colour — then carefully bottled in food-grade packaging and sealed to preserve
                        freshness. Available in 1 KG, 5 KG, and 15 KG for homes, families, and businesses.</p>
                    <a href="{{ route('products.index') }}"
                        class="inline-block bg-amber-500 hover:bg-amber-600 text-white font-bold py-3.5 px-8 rounded-xl transition text-base">
                        Shop Now
                    </a>
                </div>
            </div>

        </div>{{-- end .space-y-24 --}}
    </div>
</section>

{{-- Why It Matters --}}
<section class="py-20 bg-gradient-to-br from-stone-800 to-stone-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold font-serif mb-4">Why Our Process Matters</h2>
            <p class="text-stone-300 text-lg max-w-2xl mx-auto">The difference between cold pressed and refined oil is
                not just in the bottle.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-3xl p-8 text-center"
                style="background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.10)">
                <div class="text-5xl mb-5">🌿</div>
                <h3 class="text-xl font-bold mb-3 text-white">Zero Chemicals</h3>
                <p class="text-stone-300 leading-relaxed">No hexane solvents. No bleaching agents. No deodorizers.
                    Purely mechanical pressing — the way nature intended.</p>
            </div>
            <div class="bg-white rounded-3xl p-8 text-center"
                style="background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.10)">
                <div class="text-5xl mb-5">🔬</div>
                <h3 class="text-xl font-bold mb-3 text-white">Nutrients Intact</h3>
                <p class="text-stone-300 leading-relaxed">Because we never exceed 45°C, all Vitamin E, antioxidants, and
                    natural fatty acids remain completely preserved.</p>
            </div>
            <div class="bg-white rounded-3xl p-8 text-center"
                style="background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.10)">
                <div class="text-5xl mb-5">🏺</div>
                <h3 class="text-xl font-bold mb-3 text-white">Traditional Wisdom</h3>
                <p class="text-stone-300 leading-relaxed">The Kachi Ghani method has been trusted by Indian families for
                    centuries. We preserve this heritage in every batch.</p>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20 bg-amber-500 text-white text-center">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-4xl font-extrabold font-serif mb-4">Taste the Difference</h2>
        <p class="text-amber-100 text-lg mb-8">Now you know exactly how our oil is made — pure, natural, and
            chemical-free. Ready to try it?</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('products.index') }}"
                class="bg-white text-amber-700 hover:bg-amber-50 font-extrabold py-3.5 px-10 rounded-2xl transition text-base">Shop
                Products</a>
            <a href="{{ route('contact') }}"
                class="border-2 border-white font-bold py-3.5 px-10 rounded-2xl transition text-base text-white hover:bg-amber-600">Contact
                Us</a>
        </div>
    </div>
</section>

@endsection
