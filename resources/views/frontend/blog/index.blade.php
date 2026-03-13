@extends('frontend.layouts.app')

@section('title', 'Blog — Cold Pressed Oil Tips & Health Articles | Amrutam Oil')

@section('content')

{{-- Header --}}
<section class="bg-gradient-to-br from-stone-50 to-amber-50 py-12 border-b border-stone-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-amber-600 font-bold tracking-widest uppercase text-sm block mb-3">Health & Knowledge</span>
        <h1 class="text-5xl font-extrabold text-stone-900 font-serif mb-4">Our Blog</h1>
        <p class="text-lg text-stone-500 max-w-2xl mx-auto">
            Expert articles on cold pressed oil, healthy cooking, and premium Indian food traditions shaped for modern kitchens.
        </p>
    </div>
</section>

{{-- Blog Grid --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if($blogs->isEmpty())
        <div class="text-center py-20">
            <p class="text-stone-400 text-lg">No articles published yet. Check back soon!</p>
        </div>
        @else

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($blogs as $blog)
            <article
                class="bg-white rounded-3xl border border-stone-100 shadow-sm hover:shadow-xl transition-all duration-400 group overflow-hidden flex flex-col">
                {{-- Category Banner --}}
                <div class="h-3 bg-gradient-to-r from-amber-400 to-amber-600"></div>

                <div class="p-7 flex flex-col flex-grow">
                    {{-- Category + Read Time --}}
                    <div class="flex items-center gap-3 mb-4">
                        <span class="bg-amber-100 text-amber-700 text-xs font-bold px-3 py-1 rounded-full">{{
                            $blog->category }}</span>
                        <span class="text-stone-400 text-xs">{{ $blog->read_time }}</span>
                    </div>

                    {{-- Title --}}
                    <h2
                        class="text-xl font-bold text-stone-900 mb-3 leading-snug group-hover:text-amber-600 transition-colors duration-200 line-clamp-3">
                        <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                    </h2>

                    {{-- Excerpt --}}
                    <p class="text-stone-500 text-sm leading-relaxed mb-6 flex-grow line-clamp-3">
                        {{ $blog->excerpt }}
                    </p>

                    {{-- Footer --}}
                    <div class="flex items-center justify-between pt-4 border-t border-stone-100">
                        <span class="text-stone-400 text-xs">
                            {{ $blog->published_at?->format('d M Y') }}
                        </span>
                        <a href="{{ route('blog.show', $blog->slug) }}"
                            class="text-amber-600 font-bold text-sm hover:text-amber-800 inline-flex items-center gap-1 transition">
                            Read More
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($blogs->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $blogs->links() }}
        </div>
        @endif

        @endif
    </div>
</section>

{{-- CTA --}}
<section class="py-16 bg-stone-900 text-white text-center">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-3xl font-bold font-serif mb-4">Ready to Switch to Pure Oil?</h2>
        <p class="text-stone-300 mb-8">Order Amrutam Cold Pressed Groundnut Oil — chemical-free, low-temperature extracted, and full of natural aroma.</p>
        <a href="{{ route('products.index') }}"
            class="inline-block bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-8 rounded-xl transition">
            Shop Now →
        </a>
    </div>
</section>

@endsection
