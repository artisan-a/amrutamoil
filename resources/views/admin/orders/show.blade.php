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
                @if($order->payment_status === 'Pending')
                <a href="{{ route('admin.orders.edit', $order) }}"
                    class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2.5 px-6 rounded-xl transition shadow-sm whitespace-nowrap flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L12 15l-4 1 1-4 8.586-8.586z">
                        </path>
                    </svg>
                    Edit Invoice
                </a>
                @endif
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
            <div id="print-area"
                class="relative bg-white rounded-2xl shadow-sm overflow-hidden p-10 border border-stone-200"
                style="font-family: 'DejaVu Sans', 'Helvetica Neue', Arial, sans-serif;">
                <div class="invoice-watermark absolute inset-0 z-0 flex items-center justify-center pointer-events-none">
                    <img src="{{ asset('images/amrutam-wordmark.png') }}" alt=""
                        class="w-[520px] max-w-[85%] select-none"
                        style="transform: rotate(-23deg); opacity: 0.065; filter: grayscale(1) brightness(2.3) contrast(0.25);"
                        onerror="this.style.display='none';">
                </div>

                <!-- Invoice Header -->
                <div class="relative z-10 flex justify-between items-start border-b border-stone-100 pb-8 mb-8">
                    <div class="flex items-start gap-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Amrutam Logo" class="w-10 h-10 object-contain">
                        <div>
                            <img src="{{ asset('images/amrutam-wordmark.png') }}" alt="Amrutam"
                                class="h-7 w-auto mb-2 object-contain"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                            <h1 class="text-3xl font-serif font-bold text-amber-600 mb-2" style="display:none;">Amrutam
                                Ground Nut Oil</h1>
                            <p class="text-stone-500 max-w-xs text-sm">
                                G-16, Shyam Elegance, Nana Chiloda<br>
                                Ahmedabad, Gujarat - 382330<br>
                                Phone: +91 9979790609<br>
                                Email: pure@amrutamoil.com
                            </p>
                        </div>
                    </div>
                    <div class="text-right min-w-[300px]">
                        <h2 class="text-4xl font-black text-stone-500 uppercase tracking-wider mb-4">Invoice</h2>
                        <table class="ml-auto text-sm text-stone-700">
                            <tr>
                                <td class="font-bold pr-3 py-0.5 text-right whitespace-nowrap">Invoice Number:</td>
                                <td class="font-bold text-stone-900 py-0.5 text-right">{{ $order->invoice_number }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold pr-3 py-0.5 text-right whitespace-nowrap">Invoice Date:</td>
                                <td class="text-stone-900 py-0.5 text-right">{{ $order->order_date->format('F d, Y') }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold pr-3 py-0.5 text-right">Status:</td>
                                <td class="font-bold text-stone-900 py-0.5 text-right">{{ $order->payment_status }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Bill To -->
                <div class="relative z-10 mb-10 block">
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
                <div class="relative z-10 mb-10">
                    <table class="w-full text-left table-fixed">
                        <colgroup>
                            <col class="w-[52%]">
                            <col class="w-[16%]">
                            <col class="w-[16%]">
                            <col class="w-[16%]">
                        </colgroup>
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
                                <td class="py-4 px-4 text-center align-top">{{ $item->quantity }}</td>
                                <td class="py-4 px-4 text-right align-top">{{ number_format($item->price, 2) }}</td>
                                <td class="py-4 px-4 text-right align-top font-medium text-stone-900">{{
                                    number_format($item->total, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Totals -->
                <div class="relative z-10 flex justify-end">
                    <div class="w-full max-w-sm text-stone-700">
                        <table class="w-full border-collapse">
                            <tr>
                                <td class="px-4 py-2 font-bold text-stone-700">Subtotal:</td>
                                <td class="px-4 py-2 text-right text-stone-800">₹{{ number_format($order->total_amount, 2) }}</td>
                            </tr>
                            @if($order->discount > 0)
                            <tr>
                                <td class="px-4 py-2 font-bold text-green-700">Discount:</td>
                                <td class="px-4 py-2 text-right text-green-700">- ₹{{ number_format($order->discount, 2) }}</td>
                            </tr>
                            @endif
                            <tr class="border-y border-stone-300 bg-stone-50">
                                <td class="px-4 py-3 font-bold text-2xl text-stone-900">Final Total:</td>
                                <td class="px-4 py-3 text-right font-bold text-4xl text-amber-600">₹{{ number_format($order->final_amount, 2) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Footer -->
                <div class="relative z-10 mt-16 pt-8 border-t border-stone-100 text-center text-stone-400 text-sm">
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
            html,
            body {
                margin: 0 !important;
                padding: 0 !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            body * {
                visibility: hidden;
            }

            #print-area,
            #print-area * {
                visibility: visible;
            }

            #print-area {
                position: relative !important;
                left: auto !important;
                top: auto !important;
                width: 100% !important;
                max-width: 100% !important;
                margin: 0 !important;
                border: none !important;
                border-radius: 0 !important;
                box-shadow: none !important;
                box-sizing: border-box !important;
                min-height: calc(297mm - 12mm) !important;
                padding: 3mm 6mm 6mm 6mm !important;
                color: #000 !important;
                background: #fff !important;
                overflow: visible !important;
            }

            .py-12,
            .max-w-4xl,
            .sm\:px-6,
            .lg\:px-8 {
                margin: 0 !important;
                padding: 0 !important;
                max-width: 100% !important;
                width: 100% !important;
            }

            /* Print in clear black-and-white with readable borders/text. */
            #print-area,
            #print-area * {
                color: #000 !important;
                box-shadow: none !important;
                text-shadow: none !important;
            }

            #print-area .bg-stone-50 {
                background: #f5f5f5 !important;
            }

            #print-area table,
            #print-area th,
            #print-area td,
            #print-area div {
                border-color: #666 !important;
            }

            #print-area .invoice-watermark {
                position: fixed !important;
                left: 50% !important;
                top: 50% !important;
                transform: translate(-50%, -50%) rotate(-23deg) !important;
                z-index: 0 !important;
                display: block !important;
                filter: none !important;
                width: auto !important;
                height: auto !important;
                inset: auto !important;
            }

            #print-area .invoice-watermark img {
                width: 150mm !important;
                max-width: none !important;
                opacity: 0.11 !important;
                transform: none !important;
                filter: grayscale(1) brightness(1.7) contrast(0.55) !important;
            }

            @page {
                size: A4 portrait;
                margin: 6mm;
            }
        }
    </style>
    @endpush
</x-app-layout>
