@extends('frontend.layouts.app')

@section('title', ($blog->meta_title ?? $blog->title) . ' | Amrutam Oil')

@section('content')

{{-- Breadcrumb --}}
<div class="bg-stone-50 border-b border-stone-100 py-4">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-sm text-stone-500">
            <a href="{{ route('home') }}" class="hover:text-amber-600 transition">Home</a>
            <span>/</span>
            <a href="{{ route('blog.index') }}" class="hover:text-amber-600 transition">Blog</a>
            <span>/</span>
            <span class="text-stone-800 font-medium">{{ Str::limit($blog->title, 55) }}</span>
        </nav>
    </div>
</div>

{{-- Article --}}
<article class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-10">
            <div class="flex flex-wrap items-center gap-3 mb-5">
                <span class="bg-amber-100 text-amber-700 text-xs font-bold px-3 py-1.5 rounded-full">{{ $blog->category }}</span>
                <span class="text-stone-400 text-sm">{{ $blog->read_time }}</span>
                <span class="text-stone-400 text-sm">{{ $blog->published_at ? $blog->published_at->format('d M Y') : '' }}</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-stone-900 font-serif leading-tight mb-6">{{ $blog->title }}</h1>
            @if($blog->excerpt)
            <p class="text-xl text-stone-500 leading-relaxed border-l-4 border-amber-400 pl-5 italic">{{ $blog->excerpt }}</p>
            @endif
        </div>

        <div class="w-full h-px bg-stone-100 mb-10"></div>

        <div class="blog-content">{!! $blog->content !!}</div>

        <div class="w-full h-px bg-stone-100 my-12"></div>

        <div class="bg-gradient-to-br from-amber-50 to-stone-50 border border-amber-100 rounded-3xl p-8 text-center">
            <div class="text-3xl mb-3">🌿</div>
            <h3 class="text-2xl font-bold text-stone-900 font-serif mb-3">Try Amrutam Cold Pressed Groundnut Oil</h3>
            <p class="text-stone-500 mb-6 max-w-lg mx-auto">100% pure, chemical-free, and cold pressed in modern low-temperature machines. Available in 1 KG, 5 KG, and 15 KG packs.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('products.index') }}" class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-8 rounded-xl transition">Shop Now</a>
                <a href="{{ route('contact') }}" class="border-2 border-stone-200 hover:border-amber-400 text-stone-700 hover:text-amber-600 font-bold py-3 px-8 rounded-xl transition">Contact Us</a>
            </div>
        </div>

        <div class="mt-10">
            <a href="{{ route('blog.index') }}" class="text-amber-600 font-semibold hover:text-amber-800 inline-flex items-center gap-2 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Back to Blog
            </a>
        </div>
    </div>
</article>

@if($related->isNotEmpty())
<section class="py-16 bg-stone-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-stone-900 font-serif mb-8">Related Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($related as $post)
            <article class="bg-white rounded-2xl border border-stone-100 shadow-sm hover:shadow-lg transition-all duration-300 group overflow-hidden">
                <div class="h-2 bg-gradient-to-r from-amber-400 to-amber-600"></div>
                <div class="p-6">
                    <span class="bg-amber-100 text-amber-700 text-xs font-bold px-2 py-1 rounded-full">{{ $post->category }}</span>
                    <h3 class="text-lg font-bold text-stone-900 mt-3 mb-2 line-clamp-2 group-hover:text-amber-600 transition">
                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                    </h3>
                    <p class="text-stone-500 text-sm line-clamp-2 mb-4">{{ $post->excerpt }}</p>
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-amber-600 font-bold text-sm hover:text-amber-800 inline-flex items-center gap-1">Read More</a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

@push('scripts')
<style>
.blog-content h2{font-size:1.75rem;font-weight:800;color:#1c1917;font-family:'Playfair Display',serif;margin-top:2.5rem;margin-bottom:1rem}
.blog-content h3{font-size:1.25rem;font-weight:700;color:#292524;margin-top:1.5rem;margin-bottom:.5rem}
.blog-content p{color:#57534e;line-height:1.8;margin-bottom:1rem}
.blog-content ul,.blog-content ol{color:#57534e;padding-left:1.5rem;margin-bottom:1rem}
.blog-content li{margin-bottom:.4rem;line-height:1.7}
.blog-content a{color:#d97706;font-weight:600;text-decoration:underline}
.blog-content strong{color:#1c1917}
.blog-content table{width:100%;border-collapse:collapse;margin:1rem 0}
.blog-content th{background:#fef3c7;color:#1c1917;font-weight:700;padding:.75rem;border:1px solid #e7e5e4;text-align:left}
.blog-content td{padding:.75rem;border:1px solid #f5f5f4;color:#57534e}
</style>
@endpush
