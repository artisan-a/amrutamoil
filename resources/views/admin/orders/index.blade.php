<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="font-bold text-2xl text-stone-900 leading-tight font-serif">
                {{ __('Invoices & Orders') }}
            </h2>
            <div class="flex gap-4 w-full sm:w-auto">
                <form action="{{ route('admin.orders.index') }}" method="GET" class="flex-1 sm:w-64">
                    <div class="relative">
                        <input type="text" name="search" value="{{ $search ?? '' }}"
                            placeholder="Search by INV# or Name..."
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border-stone-200 focus:border-amber-500 focus:ring-amber-500 shadow-sm text-sm">
                        <div class="absolute left-3 top-3 text-stone-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </form>
                <a href="{{ route('admin.orders.create') }}"
                    class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2.5 px-6 rounded-xl transition shadow-sm whitespace-nowrap flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    New Invoice
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl border border-stone-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-stone-50 border-b border-stone-200">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                    Invoice No</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                    Customer</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                    Date</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                    Total</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                    Status</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest text-right">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100">
                            @forelse($orders as $order)
                            <tr class="hover:bg-stone-50 transition group">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="font-bold text-stone-900">{{ $order->invoice_number }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-stone-700 font-medium">{{ $order->customer->customer_name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-stone-600">{{ $order->order_date->format('M d, Y') }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="font-bold text-stone-900 tracking-wide">₹{{
                                        number_format($order->final_amount, 2) }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($order->payment_status == 'Paid')
                                    <span
                                        class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1.5 rounded-full">Paid</span>
                                    @elseif($order->payment_status == 'Pending')
                                    <span
                                        class="bg-amber-100 text-amber-700 text-xs font-bold px-3 py-1.5 rounded-full">Pending</span>
                                    @else
                                    <span
                                        class="bg-red-100 text-red-700 text-xs font-bold px-3 py-1.5 rounded-full">Cancelled</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right">
                                    <div class="flex gap-4 justify-end">
                                        <a href="{{ route('admin.orders.show', $order) }}"
                                            class="text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center gap-1 transition">
                                            View Invoice
                                        </a>
                                        <form action="{{ route('admin.orders.destroy', $order) }}" method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('Delete this invoice? This will restore the product stock quantities.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700 font-semibold inline-flex items-center gap-1 transition">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="text-stone-400 mb-2">
                                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="text-stone-500 font-medium text-lg">No orders found</p>
                                    <p class="text-stone-400 text-sm mt-1">Create a new invoice to get started.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-6 border-t border-stone-100">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>