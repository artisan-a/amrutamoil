<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.orders.index') }}" class="text-stone-400 hover:text-stone-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <h2 class="font-bold text-2xl text-stone-900 leading-tight font-serif">
                    Invoice {{ $order->invoice_number }}
                </h2>
                @if($order->payment_status == 'Paid')
                <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1.5 rounded-full ml-4">Paid</span>
                @elseif($order->payment_status == 'Pending')
                <span class="bg-amber-100 text-amber-700 text-xs font-bold px-3 py-1.5 rounded-full ml-4">Pending</span>
                @else
                <span class="bg-red-100 text-red-700 text-xs font-bold px-3 py-1.5 rounded-full ml-4">Cancelled</span>
                @endif
            </div>

            <div class="flex gap-4">
                <a href="{{ route('admin.orders.pdf', $order) }}"
                    class="bg-stone-800 hover:bg-stone-900 text-white font-bold py-2.5 px-6 rounded-xl transition shadow-sm whitespace-nowrap flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Download PDF
                </a>
                <button onclick="window.print()"
                    class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2.5 px-6 rounded-xl transition shadow-sm whitespace-nowrap flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                        </path>
                    </svg>
                    Print
                </button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Printable Invoice Area -->
            <div id="print-area" class="bg-white rounded-2xl shadow-sm overflow-hidden p-10 border border-stone-200">

                <!-- Invoice Header -->
                <div class="flex justify-between items-start border-b border-stone-100 pb-8 mb-8">
                    <div>
                        <h1 class="text-3xl font-serif font-bold text-amber-600 mb-2">Amrutam Ground Nut Oil</h1>
                        <p class="text-stone-500 max-w-xs text-sm">
                            123 Oil Mill Road, Industrial Area<br>
                            Rajkot, Gujarat - 360002<br>
                            Phone: +91 9876543210<br>
                            Email: contact@amrutamoil.com
                        </p>
                    </div>
                    <div class="text-right">
                        <h2 class="text-4xl font-black text-stone-200 uppercase tracking-widest mb-4">Invoice</h2>
                        <div class="text-sm">
                            <p class="mb-1"><span class="text-stone-500 font-bold">Invoice Number:</span> <span
                                    class="text-stone-900 font-bold ml-2">{{ $order->invoice_number }}</span></p>
                            <p class="mb-1"><span class="text-stone-500 font-bold">Invoice Date:</span> <span
                                    class="text-stone-900 ml-2">{{ $order->order_date->format('F d, Y') }}</span></p>
                            <p><span class="text-stone-500 font-bold">Status:</span> <span
                                    class="text-stone-900 ml-2 font-bold">{{ $order->payment_status }}</span></p>
                        </div>
                    </div>
                </div>

                <!-- Bill To -->
                <div class="mb-10 block">
                    <h3 class="text-sm font-bold text-stone-400 uppercase tracking-widest mb-3">Bill To:</h3>
                    <h4 class="text-lg font-bold text-stone-900">{{ $order->customer->customer_name }}</h4>
                    @if($order->customer->address)
                    <p class="text-stone-600 mt-1 max-w-md">{{ $order->customer->address }}</p>
                    @endif
                    @if($order->customer->city || $order->customer->state || $order->customer->pincode)
                    <p class="text-stone-600 mt-1">
                        {{ collect([$order->customer->city, $order->customer->state,
                        $order->customer->pincode])->filter()->join(', ') }}
                    </p>
                    @endif
                    <div class="mt-2 text-stone-500 text-sm">
                        @if($order->customer->phone)<p>Phone: {{ $order->customer->phone }}</p>@endif
                        @if($order->customer->email)<p>Email: {{ $order->customer->email }}</p>@endif
                    </div>
                </div>

                <!-- Items Table -->
                <div class="mb-10">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-y border-stone-200 bg-stone-50">
                                <th class="py-4 px-4 font-bold text-stone-900 text-sm">Description</th>
                                <th class="py-4 px-4 font-bold text-stone-900 text-sm text-center">Quantity</th>
                                <th class="py-4 px-4 font-bold text-stone-900 text-sm text-right">Price (₹)</th>
                                <th class="py-4 px-4 font-bold text-stone-900 text-sm text-right">Total (₹)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100 text-stone-700">
                            @foreach($order->items as $item)
                            <tr>
                                <td class="py-4 px-4">
                                    <span class="font-bold text-stone-800 block">{{ $item->product->name }}</span>
                                    <span class="text-sm text-stone-500">{{ $item->product->size }}</span>
                                </td>
                                <td class="py-4 px-4 text-center">{{ $item->quantity }}</td>
                                <td class="py-4 px-4 text-right">{{ number_format($item->price, 2) }}</td>
                                <td class="py-4 px-4 text-right font-medium text-stone-900">{{
                                    number_format($item->total, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Totals -->
                <div class="flex justify-end">
                    <div class="w-full max-w-sm space-y-3 text-stone-700">
                        <div class="flex justify-between items-center px-4">
                            <span class="font-bold">Subtotal:</span>
                            <span>₹{{ number_format($order->total_amount, 2) }}</span>
                        </div>
                        @if($order->discount > 0)
                        <div class="flex justify-between items-center px-4 text-green-600">
                            <span class="font-bold">Discount:</span>
                            <span>- ₹{{ number_format($order->discount, 2) }}</span>
                        </div>
                        @endif
                        <div
                            class="flex justify-between items-center px-4 py-4 bg-stone-50 border-y border-stone-200 mt-2">
                            <span class="font-bold text-xl text-stone-900">Final Total:</span>
                            <span class="font-bold text-2xl text-amber-600 font-serif">₹{{
                                number_format($order->final_amount, 2) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="mt-16 pt-8 border-t border-stone-100 text-center text-stone-400 text-sm">
                    <p class="font-bold text-stone-600 mb-1">Thank you for your business!</p>
                    <p>If you have any questions about this invoice, please contact us.</p>
                </div>

            </div>
        </div>
    </div>

    <!-- Print Stylesheet -->
    @push('scripts')
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #print-area,
            #print-area * {
                visibility: visible;
            }

            #print-area {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                border: none;
                box-shadow: none;
                padding: 0;
            }

            /* Hide the browser header/footer margins */
            @page {
                margin: 0;
                size: auto;
            }
        }
    </style>
    @endpush
</x-app-layout>