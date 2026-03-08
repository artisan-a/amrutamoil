<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-stone-900 leading-tight font-serif">
                {{ __('Products') }}
            </h2>
            <a href="{{ route('admin.products.create') }}"
                class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2.5 px-6 rounded-xl transition shadow-sm">
                + Add Product
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl border border-stone-100 shadow-sm overflow-hidden">
                <table class="w-full">
                    <thead class="bg-stone-50 border-b border-stone-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                Name</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                Size</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                Price</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                Stock</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                Status</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @foreach($products as $product)
                        <tr class="hover:bg-stone-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-stone-900">{{ $product->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-stone-500">{{ $product->size }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-stone-500 tracking-wide">₹{{ $product->price }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="font-bold {{ $product->stock_quantity <= 5 ? 'text-red-600' : 'text-stone-900' }}">
                                    {{ $product->stock_quantity }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($product->status)
                                <span
                                    class="bg-green-100 text-green-700 text-xs font-bold px-2.5 py-1 rounded-full">Active</span>
                                @else
                                <span
                                    class="bg-stone-100 text-stone-600 text-xs font-bold px-2.5 py-1 rounded-full">Inactive</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex gap-3">
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                        class="text-amber-600 hover:text-amber-800 font-semibold transition">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-500 hover:text-red-700 font-semibold transition">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-6 border-t border-stone-100">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>