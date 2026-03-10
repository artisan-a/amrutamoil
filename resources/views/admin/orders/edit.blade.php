<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.orders.index') }}" class="text-stone-400 hover:text-stone-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="font-bold text-2xl text-stone-900 leading-tight font-serif">
                {{ __('Edit Invoice Status') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.orders.update', $order) }}" method="POST"
                class="bg-white rounded-2xl border border-stone-100 shadow-sm p-8 space-y-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-xs font-bold text-stone-400 uppercase tracking-widest mb-1">Invoice Number</p>
                        <p class="text-lg font-bold text-stone-900">{{ $order->invoice_number }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-stone-400 uppercase tracking-widest mb-1">Customer</p>
                        <p class="text-lg font-semibold text-stone-800">{{ $order->customer->customer_name }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-stone-400 uppercase tracking-widest mb-1">Invoice Date</p>
                        <p class="text-lg font-semibold text-stone-800">{{ $order->order_date->format('M d, Y') }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-stone-400 uppercase tracking-widest mb-1">Final Amount</p>
                        <p class="text-2xl font-bold text-amber-600">₹{{ number_format($order->final_amount, 2) }}</p>
                    </div>
                </div>

                <div class="border-t border-stone-100 pt-6">
                    <label for="payment_status" class="text-sm font-bold text-stone-700 block mb-2">Payment Status</label>
                    <select id="payment_status" name="payment_status" required
                        class="w-full md:w-72 border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500">
                        <option value="Pending" @selected(old('payment_status', $order->payment_status) === 'Pending')>Pending</option>
                        <option value="Paid" @selected(old('payment_status', $order->payment_status) === 'Paid')>Paid</option>
                        <option value="Cancelled" @selected(old('payment_status', $order->payment_status) === 'Cancelled')>Cancelled</option>
                    </select>
                    @error('payment_status')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-4 pt-2">
                    <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-8 rounded-xl transition shadow-sm">
                        Update Invoice
                    </button>
                    <a href="{{ route('admin.orders.show', $order) }}"
                        class="border border-stone-200 text-stone-600 hover:text-stone-800 font-bold py-3 px-8 rounded-xl transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
