@extends('frontend.layouts.app')

@section('title', 'Why Cold Pressed Oil? | Amrutam Ground Nut Oil')

@section('content')
<div class="bg-stone-100 py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-16 fade-up">
            <h1 class="text-4xl md:text-6xl font-bold font-serif text-[#1c1917] mb-6">Refined vs. Cold Pressed</h1>
            <p class="text-xl text-[#57534e] max-w-3xl mx-auto">Discover why making the switch to traditional
                cold-pressed oil is the best decision for your family's health.</p>
        </div>

        <!-- Comparison Table / Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 max-w-5xl mx-auto fade-up delay-200">

            <!-- Refined Commercial Oil -->
            <div
                class="bg-white rounded-3xl p-8 shadow-sm border border-amber-900/50 relative overflow-hidden group hover:shadow-xl transition-all duration-300">
                <div
                    class="absolute top-0 right-0 w-24 h-24 bg-red-50 rounded-bl-full -z-10 transition-transform group-hover:scale-150">
                </div>

                <h3 class="text-2xl font-bold text-stone-900 mb-6 pb-4 border-b border-stone-100">Commercial Refined Oil
                </h3>

                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <span class="text-red-500 mt-1">✗</span>
                        <p class="text-[#57534e]"><strong>High Heat Extraction:</strong> Extracted at 200°C+, destroying
                            natural nutrients.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-red-500 mt-1">✗</span>
                        <p class="text-[#57534e]"><strong>Chemical Solvents:</strong> Uses Hexane to extract maximum oil
                            from seeds.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-red-500 mt-1">✗</span>
                        <p class="text-[#57534e]"><strong>Bleaching/Deodorizing:</strong> Artificial chemicals used to
                            remove smell and color.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-red-500 mt-1">✗</span>
                        <p class="text-[#57534e]"><strong>Trans Fats:</strong> High heat generates unhealthy trans fats.
                        </p>
                    </li>
                </ul>
            </div>

            <!-- Cold Pressed -->
            <div
                class="bg-gradient-to-br from-amber-600 to-amber-800 rounded-3xl p-8 shadow-xl text-white relative overflow-hidden transform md:-translate-y-4 hover:translate-y-[-24px] transition-all duration-300">
                <div
                    class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] mix-blend-overlay">
                </div>

                <h3 class="text-2xl font-bold mb-6 pb-4 border-b border-amber-500/50">100% Cold Pressed</h3>

                <ul class="space-y-4 relative z-10">
                    <li class="flex items-start gap-3">
                        <span class="text-green-300 mt-1">✓</span>
                        <p><strong>Room Temperature:</strong> Crushed gently below 45°C. Nutrients remain intact.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-300 mt-1">✓</span>
                        <p><strong>Zero Chemicals:</strong> Extracted mechanically using wooden churners. No solvents.
                        </p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-300 mt-1">✓</span>
                        <p><strong>Natural Filters:</strong> Naturally sedimented. Retains its golden color and
                            authentic aroma.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-300 mt-1">✓</span>
                        <p><strong>Heart Healthy:</strong> Rich in antioxidants (Vitamin E) and healthy MUFA fats.</p>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        gsap.from(".fade-up", {
            y: 40,
            opacity: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: "power2.out"
        });
    });
</script>
@endpush