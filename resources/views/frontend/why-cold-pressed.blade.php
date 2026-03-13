@extends('frontend.layouts.app')

@section('title', 'Why Cold Pressed Oil? | Amrutam Ground Nut Oil')

@section('content')
<div class="bg-gradient-to-b from-stone-50 to-stone-100 pt-4 sm:pt-6 lg:pt-8 pb-12 sm:pb-16 lg:pb-24 relative overflow-hidden">
    <div class="absolute top-12 -left-20 w-72 h-72 bg-amber-100/60 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 -right-24 w-80 h-80 bg-stone-200/70 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-10 sm:mb-14 lg:mb-16 fade-up">
            <span
                class="inline-block mb-4 px-4 py-1.5 rounded-full bg-amber-100 text-amber-700 font-bold text-xs tracking-[0.18em] uppercase">
                Side-by-Side Comparison
            </span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold font-serif text-[#1c1917] leading-tight mb-5">
                Refined vs. Cold Pressed
            </h1>
            <p class="text-base sm:text-lg lg:text-xl text-[#57534e] max-w-3xl mx-auto leading-relaxed">
                Discover why switching to premium cold pressed oil can be better for daily cooking and long-term
                family health.
            </p>
        </div>

        <div class="relative grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-10 max-w-6xl mx-auto fade-up delay-200">
            <div class="hidden md:block absolute left-1/2 top-3 bottom-3 w-px -translate-x-1/2 bg-stone-300/70"></div>

            <div
                class="h-full bg-white rounded-3xl p-6 sm:p-8 shadow-lg border border-stone-200/80 relative overflow-hidden">
                <div
                    class="absolute top-0 right-0 w-24 h-24 bg-red-50 rounded-bl-full -z-10">
                </div>

                <h3 class="text-2xl font-bold text-stone-900 mb-6 pb-4 border-b border-stone-100">
                    Commercial Refined Oil
                </h3>

                <ul class="space-y-5">
                    <li class="flex items-start gap-3">
                        <span
                            class="mt-0.5 w-6 h-6 rounded-full bg-red-100 text-red-600 flex items-center justify-center font-bold text-sm">✕</span>
                        <p class="text-[#57534e] text-lg leading-relaxed"><strong>High Heat Extraction:</strong>
                            Extracted at 200°C+, destroying
                            natural nutrients.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span
                            class="mt-0.5 w-6 h-6 rounded-full bg-red-100 text-red-600 flex items-center justify-center font-bold text-sm">✕</span>
                        <p class="text-[#57534e] text-lg leading-relaxed"><strong>Chemical Solvents:</strong> Uses
                            Hexane to extract maximum oil
                            from seeds.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span
                            class="mt-0.5 w-6 h-6 rounded-full bg-red-100 text-red-600 flex items-center justify-center font-bold text-sm">✕</span>
                        <p class="text-[#57534e] text-lg leading-relaxed"><strong>Bleaching/Deodorizing:</strong>
                            Artificial chemicals used to
                            remove smell and color.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span
                            class="mt-0.5 w-6 h-6 rounded-full bg-red-100 text-red-600 flex items-center justify-center font-bold text-sm">✕</span>
                        <p class="text-[#57534e] text-lg leading-relaxed"><strong>Trans Fats:</strong> High heat
                            generates unhealthy trans fats.
                        </p>
                    </li>
                </ul>
            </div>

            <div
                class="h-full rounded-3xl p-6 sm:p-8 shadow-xl text-white relative overflow-hidden"
                style="background: linear-gradient(135deg, #a74a00 0%, #8f3700 45%, #6d2600 100%);">
                <div
                    class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] mix-blend-overlay">
                </div>

                <h3 class="text-2xl font-bold mb-6 pb-4 text-white" style="border-bottom: 1px solid rgba(255, 237, 213, 0.45);">
                    100% Cold Pressed
                </h3>

                <ul class="space-y-5 relative z-10">
                    <li class="flex items-start gap-3">
                        <span
                            class="mt-0.5 w-6 h-6 rounded-full flex items-center justify-center font-bold text-sm"
                            style="background: rgba(167, 243, 208, 0.22); color: #ecfdf5;">✓</span>
                        <p class="text-lg leading-relaxed" style="color: #fff7ed;"><strong class="text-white">Low Temperature:</strong> Pressed gently below 45°C.
                            Nutrients remain intact.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span
                            class="mt-0.5 w-6 h-6 rounded-full flex items-center justify-center font-bold text-sm"
                            style="background: rgba(167, 243, 208, 0.22); color: #ecfdf5;">✓</span>
                        <p class="text-lg leading-relaxed" style="color: #fff7ed;"><strong class="text-white">Zero Chemicals:</strong> Extracted mechanically using
                            modern cold press machines. No solvents.
                        </p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span
                            class="mt-0.5 w-6 h-6 rounded-full flex items-center justify-center font-bold text-sm"
                            style="background: rgba(167, 243, 208, 0.22); color: #ecfdf5;">✓</span>
                        <p class="text-lg leading-relaxed" style="color: #fff7ed;"><strong class="text-white">Natural Filters:</strong> Naturally sedimented.
                            Retains its golden color and
                            authentic aroma.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span
                            class="mt-0.5 w-6 h-6 rounded-full flex items-center justify-center font-bold text-sm"
                            style="background: rgba(167, 243, 208, 0.22); color: #ecfdf5;">✓</span>
                        <p class="text-lg leading-relaxed" style="color: #fff7ed;"><strong class="text-white">Heart Healthy:</strong> Rich in antioxidants (Vitamin
                            E) and healthy MUFA fats.</p>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<style>
    .fade-up {
        animation: whyFadeUp 0.55s ease-out both;
    }

    @keyframes whyFadeUp {
        from {
            opacity: 0;
            transform: translateY(12px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .fade-up {
            animation: none !important;
            opacity: 1 !important;
            transform: none !important;
        }
    }
</style>
@endpush
