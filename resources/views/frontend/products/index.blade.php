@extends('frontend.layouts.app')

@section('title', 'Our Products | Amrutam Ground Nut Oil')

@section('content')
<div class="bg-[#fafaf9] min-h-screen">

    {{-- Page Header --}}
    <div class="bg-white border-b border-stone-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-amber-600 font-bold tracking-widest uppercase text-xs mb-3 block">100% Pure &
                Natural</span>
            <h1 class="text-4xl md:text-5xl font-bold font-serif text-stone-900 mb-4">Our Pure Selection</h1>
            <p class="text-lg text-stone-500 max-w-2xl mx-auto">
                Choose the perfect size for your family. All our products contain the same 100% pure, cold-pressed
                groundnut oil.
            </p>
        </div>
    </div>

    {{-- Products Grid --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($products as $product)
            <div
                class="relative bg-white rounded-3xl border border-stone-100 shadow-md hover:shadow-2xl transition-all duration-500 group flex flex-col overflow-hidden">

                {{-- Size Badge (outside image container so it's not clipped) --}}
                <div class="absolute top-4 right-4 z-10">
                    <span class="bg-amber-500 text-white text-[11px] font-extrabold px-3 py-1.5 rounded-full shadow-xl">
                        {{ $product->size }}
                    </span>
                </div>

                {{-- Product Image --}}
                <div class="bg-stone-50 h-64 flex items-center justify-center overflow-hidden p-4">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                        class="w-full h-full object-contain transform group-hover:scale-105 transition-transform duration-700">
                </div>

                {{-- Product Info --}}
                <div class="flex flex-col flex-grow p-6">
                    <h3 class="text-xl font-bold text-stone-900 font-serif mb-2">{{ $product->name }}</h3>
                    <p class="text-stone-500 text-sm leading-relaxed mb-6 flex-grow">{{ $product->description }}</p>

                    <div class="flex items-center justify-between pt-4 border-t border-stone-100">
                        <div>
                            <p class="text-xs text-stone-400 font-semibold uppercase tracking-wide mb-0.5">Price</p>
                            <span class="text-2xl font-extrabold text-amber-600">₹{{ number_format($product->price)
                                }}</span>
                        </div>
                        <a href="{{ route('products.show', $product) }}"
                            class="bg-stone-900 hover:bg-amber-600 text-white font-bold py-3 px-8 rounded-xl shadow transition-all duration-300 text-sm tracking-wide">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-20">
                <p class="text-stone-400 text-lg">No products found. Please check back later.</p>
            </div>
            @endforelse
        </div>
    </div>@endsection