<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-stone-900 leading-tight font-serif">
            {{ __('Edit Product / Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data"
                class="bg-white rounded-2xl border border-stone-100 shadow-sm p-8 space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-input-label for="name" value="Product Name" class="text-stone-700 font-bold" />
                        <x-text-input id="name" name="name" type="text"
                            class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
                            :value="old('name', $product->name)" required />
                    </div>
                    <div>
                        <x-input-label for="size" value="Size (e.g., 1 KG Bottle)" class="text-stone-700 font-bold" />
                        <x-text-input id="size" name="size" type="text"
                            class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
                            :value="old('size', $product->size)" required />
                    </div>
                    <div>
                        <x-input-label for="price" value="Price (₹)" class="text-stone-700 font-bold" />
                        <x-text-input id="price" name="price" type="number" step="0.01"
                            class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
                            :value="old('price', $product->price)" required />
                    </div>
                    <div>
                        <x-input-label for="stock_quantity" value="Stock Quantity" class="text-stone-700 font-bold" />
                        <x-text-input id="stock_quantity" name="stock_quantity" type="number" min="0"
                            class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
                            :value="old('stock_quantity', $product->stock_quantity)" required />
                    </div>
                </div>

                <div>
                    <x-input-label for="description" value="Description" class="text-stone-700 font-bold" />
                    <textarea id="description" name="description"
                        class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500 shadow-sm"
                        rows="4" required>{{ old('description', $product->description) }}</textarea>
                </div>

                <div>
                    <x-input-label for="image" value="Product Image (Optional, leave blank to keep current)"
                        class="text-stone-700 font-bold" />
                    <input id="image" name="image" type="file" accept="image/*"
                        class="mt-1 block w-full text-sm text-stone-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100" />
                    @if($product->image)
                    <div class="mt-2">
                        <span class="text-xs text-stone-500">Current Image:</span>
                        <img src="{{ asset('storage/' . $product->image) }}"
                            class="h-16 w-16 object-cover rounded-lg border border-stone-200 mt-1" alt="Current image">
                    </div>
                    @endif
                </div>

                <div class="flex items-center mt-4">
                    <input id="status" type="checkbox" name="status" {{ $product->status ? 'checked' : '' }}
                    class="w-5 h-5 text-amber-600 bg-stone-100 border-stone-300 rounded focus:ring-amber-500
                    focus:ring-2">
                    <label for="status" class="ml-2 text-sm font-bold text-stone-700">Active (Visible
                        constraint)</label>
                </div>

                <div class="flex items-center gap-4 pt-4 border-t border-stone-100">
                    <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-8 rounded-xl transition shadow-sm">
                        Update Product
                    </button>
                    <a href="{{ route('admin.products.index') }}"
                        class="border border-stone-200 text-stone-600 hover:text-stone-800 font-bold py-3 px-8 rounded-xl transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>