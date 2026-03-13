@extends('frontend.layouts.app')

@section('title', $product->name . ' - ' . $product->size . ' | Amrutam Ground Nut Oil')

@section('content')
<div class="bg-white py-16 lg:py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-8">
            <a href="{{ route('products.index') }}"
                class="text-amber-600 font-semibold hover:text-amber-800 inline-flex items-center gap-2 no-underline">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Products
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

            <!-- Product Image -->
            <div
                class="product-image-container relative bg-stone-50 rounded-[2rem] h-[550px] flex items-center justify-center p-8 border border-stone-100 shadow-sm overflow-hidden group">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                    class="w-full h-full object-contain transform group-hover:scale-105 transition duration-700 ease-out">
            </div>

            <!-- Product Details -->
            <div class="product-details flex flex-col justify-center">
                <span class="text-amber-600 font-bold tracking-wider uppercase text-sm mb-2">Artisan Cold Pressed</span>
                <h1 class="text-4xl md:text-5xl font-bold font-serif text-[#1c1917] mb-2">{{ $product->name }}</h1>
                <p class="text-xl text-[#78716c] mb-6 font-medium">{{ $product->size }}</p>

                <div class="text-3xl font-bold text-[#1c1917] mb-6 pb-6 border-b border-stone-200 border-dashed">
                    ₹{{ number_format($product->price) }}
                    <span class="text-sm font-normal text-[#78716c] ml-2">(Inclusive of all taxes)</span>
                </div>

                <div class="prose prose-stone mb-8">
                    <p class="text-lg text-[#57534e] leading-relaxed">{{ $product->description }}</p>
                    <ul class="mt-4 space-y-2 text-[#57534e]">
                        <li class="flex items-center gap-2"><svg class="w-5 h-5 text-green-500" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg> 100% Pure, Wooden Cold Pressed</li>
                        <li class="flex items-center gap-2"><svg class="w-5 h-5 text-green-500" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg> Zero Trans Fats & No Cholesterol</li>
                        <li class="flex items-center gap-2"><svg class="w-5 h-5 text-green-500" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg> Unrefined, Unbleached</li>
                    </ul>
                </div>

                <!-- Inquiry Form Section -->
                <div class="bg-white rounded-3xl p-8 border border-stone-200 shadow-sm">
                    <h3 class="font-bold text-xl mb-6 text-stone-900 font-serif">Bulk Inquiry</h3>
                    <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label for="name"
                                    class="block text-xs font-bold uppercase tracking-wider text-stone-400 mb-2">Name</label>
                                <input type="text" name="name" id="name"
                                    class="w-full rounded-xl border-stone-200 bg-stone-50 text-stone-900 px-4 py-3 focus:border-amber-500 focus:ring-amber-500 transition shadow-sm"
                                    placeholder="Enter your name" required>
                            </div>
                            <div>
                                <label for="phone"
                                    class="block text-xs font-bold uppercase tracking-wider text-stone-400 mb-2">Phone</label>
                                <input type="text" name="phone" id="phone"
                                    class="w-full rounded-xl border-stone-200 bg-stone-50 text-stone-900 px-4 py-3 focus:border-amber-500 focus:ring-amber-500 transition shadow-sm"
                                    placeholder="Mobile number" required>
                            </div>
                        </div>

                        <div>
                            <label for="email"
                                class="block text-xs font-bold uppercase tracking-wider text-stone-400 mb-2">Email
                                (Optional)</label>
                            <input type="email" name="email" id="email"
                                class="w-full rounded-xl border-stone-200 bg-stone-50 text-stone-900 px-4 py-3 focus:border-amber-500 focus:ring-amber-500 transition shadow-sm"
                                placeholder="Email address">
                        </div>

                        <div>
                            <label for="message"
                                class="block text-xs font-bold uppercase tracking-wider text-stone-400 mb-2">Message</label>
                            <textarea name="message" id="message" rows="3"
                                class="w-full rounded-xl border-stone-200 bg-stone-50 text-stone-900 px-4 py-3 focus:border-amber-500 focus:ring-amber-500 transition shadow-sm"
                                required>Hi, I am interested in buying the {{ $product->name }} ({{ $product->size }}). Please share the delivery details.</textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-stone-900 hover:bg-amber-600 text-white font-bold py-4 rounded-xl shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                            Send Inquiry
                        </button>
                    </form>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-[#78716c] text-sm mb-2">Or order directly via WhatsApp</p>
                    <a href="https://wa.me/919979790609?text=Hi!%20I%20want%20to%20order%20{{ urlencode($product->name . ' - ' . $product->size) }}"
                        class="inline-flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-8 rounded-full shadow-lg transition duration-300 w-full sm:w-auto">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12.031 0C5.385 0 0 5.384 0 12.03c0 2.126.549 4.197 1.597 6.02L.036 24l6.12-1.603a11.968 11.968 0 0 0 5.875 1.53h.005c6.645 0 12.03-5.385 12.03-12.03 0-6.645-5.385-12.03-12.03-12.03zm0 21.947c-1.801 0-3.565-.483-5.115-1.401l-.367-.217-3.8.995.996-3.704-.239-.38C2.502 15.602 1.982 13.844 1.982 12.03c0-5.549 4.516-10.065 10.065-10.065 5.548 0 10.064 4.516 10.064 10.065s-4.516 10.065-10.064 10.065zm5.526-7.558c-.302-.15-1.794-.886-2.071-.987-.278-.101-.482-.152-.684.152-.202.304-.784.987-.96 1.19-.176.202-.352.228-.654.076-.302-.15-1.282-.473-2.443-1.509-.906-.807-1.517-1.803-1.693-2.106-.176-.304-.019-.468.132-.618.135-.135.302-.354.453-.532.152-.178.203-.304.304-.506.101-.202.05-.38-.025-.532-.076-.152-.684-1.644-.937-2.253-.245-.591-.497-.512-.684-.52h-.584c-.203 0-.532.076-.811.38-.278.304-1.066 1.04-1.066 2.536s1.091 2.94 1.243 3.143c.152.203 2.144 3.275 5.195 4.593.725.313 1.291.501 1.733.642.727.23 1.388.197 1.908.12.584-.085 1.794-.734 2.046-1.442.253-.709.253-1.317.178-1.443-.076-.126-.278-.202-.58-.353z" />
                        </svg>
                        Order via WhatsApp
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        gsap.from(".product-image-container", {
            x: -50,
            opacity: 0,
            duration: 0.8,
            ease: "power3.out"
        });

        gsap.from(".product-details > *", {
            y: 20,
            opacity: 0,
            duration: 0.6,
            stagger: 0.1,
            ease: "power2.out",
            delay: 0.3
        });
    });
</script>
@endpush