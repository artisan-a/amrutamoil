@push('styles')
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<style>
    /* Premium TomSelect Skin */
    .ts-control {
        border-radius: 0.75rem !important;
        border-color: #e5e7eb !important;
        padding: 0.625rem 0.875rem !important;
        font-size: 0.875rem !important;
        min-height: 46px !important;
        background-color: #f9fafb !important;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05) !important;
        transition: all 0.2s ease;
    }

    .ts-wrapper.focus .ts-control {
        border-color: #f59e0b !important;
        background-color: #ffffff !important;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.15) !important;
    }

    .ts-dropdown {
        border-radius: 0.75rem !important;
        border-color: #e5e7eb !important;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1) !important;
        z-index: 50 !important;
        overflow: hidden;
        margin-top: 4px !important;
    }

    .ts-dropdown .option {
        padding: 0.75rem 0.875rem !important;
        font-size: 0.875rem;
        transition: background-color 0.15s ease;
    }

    .ts-dropdown .active {
        background-color: #fffbeb !important;
        color: #92400e !important;
    }

    .stock-badge {
        font-size: 0.7rem;
        padding: 2px 8px;
        border-radius: 12px;
        font-weight: 600;
        letter-spacing: 0.025em;
    }

    #itemsContainer .ts-wrapper {
        width: 100%;
    }
</style>
@endpush

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.orders.index') }}"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-white border border-stone-200 text-stone-500 hover:text-amber-600 hover:border-amber-200 hover:bg-amber-50 transition-all shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h2 class="font-bold text-2xl text-stone-900 leading-tight font-serif tracking-tight">Create New
                        Invoice</h2>
                    <p class="text-sm text-stone-500 mt-1">Fill in the details below to generate a new customer invoice.
                    </p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-6 sm:py-8 bg-stone-50/50 min-h-screen">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Error Alerts --}}
            @if($errors->any() || session('error'))
            <div class="mb-6 space-y-3">
                @if($errors->any())
                <div class="bg-red-50 border border-red-200 p-4 rounded-xl flex items-start gap-3 shadow-sm">
                    <svg class="w-5 h-5 text-red-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <div>
                        <h3 class="text-red-800 font-bold text-sm">Validation Errors</h3>
                        <ul class="list-disc list-inside text-xs text-red-700 mt-1">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-50 border border-red-200 p-4 rounded-xl flex items-start gap-3 shadow-sm">
                    <svg class="w-5 h-5 text-red-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h3 class="text-red-800 font-bold text-sm">System Error</h3>
                        <p class="text-xs text-red-700 mt-1">{{ session('error') }}</p>
                    </div>
                </div>
                @endif
            </div>
            @endif

            <form action="{{ route('admin.orders.store') }}" method="POST" id="invoiceForm">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

                    {{-- Left Structure: Main Content --}}
                    <div class="lg:col-span-8 space-y-6">

                        {{-- Top Bar: Compact Header & Meta --}}
                        <div
                            class="bg-white rounded-2xl border border-stone-200/60 shadow-sm p-5 flex flex-wrap items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="bg-amber-50 p-2.5 rounded-xl border border-amber-100/50">
                                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs font-bold text-stone-400 uppercase tracking-widest">Draft
                                            Invoice</span>
                                        <span class="text-stone-300">•</span>
                                        <span class="text-xs font-semibold text-stone-500">{{ date('M d, Y') }}</span>
                                    </div>
                                    <h1 class="text-xl font-bold text-stone-800 tracking-tight">{{ $invoiceNumber }}
                                    </h1>
                                    <input type="hidden" name="invoice_number" value="{{ $invoiceNumber }}">
                                </div>
                            </div>

                            <div class="flex items-center gap-2">
                                <label
                                    class="text-xs font-bold text-stone-500 uppercase tracking-tighter">Status</label>
                                <select name="payment_status" required
                                    class="bg-amber-50 border-amber-200 text-amber-800 text-xs font-bold rounded-lg px-3 py-1.5 focus:ring-amber-500 transition-all">
                                    <option value="Pending" selected>Pending</option>
                                    <option value="Paid">Paid</option>
                                </select>
                            </div>
                        </div>

                        {{-- Section: Customer & Date --}}
                        <div class="bg-white rounded-2xl border border-stone-200/60 shadow-sm">
                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <div class="p-6 border-b md:border-b-0 md:border-r border-stone-100 group">
                                    <div class="flex items-center justify-between mb-3">
                                        <label
                                            class="text-xs font-black text-stone-400 uppercase tracking-widest">Select
                                            Customer</label>
                                        <a href="{{ route('admin.customers.create') }}" target="_blank"
                                            class="text-[10px] font-bold text-amber-600 bg-amber-50 px-2 py-0.5 rounded border border-amber-100 hover:bg-amber-100 transition-colors">+
                                            NEW</a>
                                    </div>
                                    <select id="customer_id" name="customer_id" required>
                                        <option value="">Search for a customer...</option>
                                        @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->customer_name }} ({{
                                            $customer->phone ?? 'N/A' }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="p-6">
                                    <label
                                        class="text-xs font-black text-stone-400 uppercase tracking-widest block mb-3">Invoice
                                        Date</label>
                                    <input type="date" name="order_date" value="{{ date('Y-m-d') }}" required
                                        class="w-full border-stone-200 rounded-xl px-4 py-2.5 text-sm bg-stone-50/50 focus:bg-white focus:border-amber-500 focus:ring-amber-500 transition-all font-medium text-stone-700">
                                </div>
                            </div>
                        </div>

                        {{-- Section: Order Items --}}
                        <div class="bg-white rounded-2xl border border-stone-200/60 shadow-sm">
                            <div
                                class="px-6 py-4 border-b border-stone-100 flex items-center justify-between bg-stone-50/30">
                                <h3 class="text-sm font-bold text-stone-800 uppercase tracking-wide">Item Particulars
                                </h3>
                                <div
                                    class="text-[10px] font-bold text-stone-400 bg-stone-100 px-2 py-0.5 rounded uppercase">
                                    Dynamic List</div>
                            </div>

                            <div class="p-0">
                                {{-- Header --}}
                                <div
                                    class="hidden lg:grid grid-cols-12 gap-4 px-6 py-3 bg-stone-50/50 border-b border-stone-100 text-[10px] font-black text-stone-400 uppercase tracking-widest">
                                    <div class="col-span-6">Product Description</div>
                                    <div class="col-span-2 text-center">Qty</div>
                                    <div class="col-span-2 text-right">Price</div>
                                    <div class="col-span-2 text-right">Total</div>
                                </div>

                                <div id="itemsContainer" class="divide-y divide-stone-50">
                                    {{-- JS rendered rows here --}}
                                </div>

                                <div class="p-4 bg-stone-50/20">
                                    <button type="button" id="addItemBtn"
                                        class="flex items-center justify-center gap-2 w-full py-3 border-2 border-dashed border-stone-200 rounded-xl text-stone-400 hover:text-amber-600 hover:border-amber-300 hover:bg-amber-50 transition-all duration-300 group">
                                        <svg class="w-4 h-4 transition-transform group-hover:scale-110" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span class="text-xs font-black uppercase tracking-widest">Add Line Item</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right Structure: Summary --}}
                    <div class="lg:col-span-4 sticky top-6">
                        <div
                            class="bg-stone-900 rounded-[2rem] shadow-2xl overflow-hidden text-white relative border border-white/5">
                            {{-- Decorative Background --}}
                            <div class="absolute -top-24 -right-24 w-48 h-48 bg-amber-500/10 blur-[80px] rounded-full">
                            </div>

                            <div class="p-8 relative">
                                <div class="flex items-center justify-between mb-10">
                                    <h3 class="text-lg font-bold text-stone-300 font-serif">Order Summary</h3>
                                    <div
                                        class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center border border-white/10">
                                        <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="space-y-6">
                                    <div class="flex justify-between items-center group">
                                        <span
                                            class="text-stone-400 text-sm font-medium group-hover:text-stone-300 transition-colors tracking-wide">Gross
                                            Subtotal</span>
                                        <span id="summarySubtotal"
                                            class="font-mono text-lg font-bold tracking-tighter transition-all">₹0.00</span>
                                    </div>

                                    <div
                                        class="bg-white/5 rounded-2xl p-5 border border-white/10 backdrop-blur-sm shadow-inner group transition-all hover:bg-white/10 hover:border-amber-500/30">
                                        <div class="flex items-center justify-between mb-3">
                                            <label
                                                class="text-[10px] font-black text-amber-400 uppercase tracking-widest">Apply
                                                Discount</label>
                                            <span class="text-[10px] text-white/30 font-mono">FIXED AMOUNT</span>
                                        </div>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <span class="text-stone-500 font-bold text-sm">₹</span>
                                            </div>
                                            <input id="discount" name="discount" type="number" min="0" step="0.01"
                                                value="0"
                                                class="w-full bg-stone-950/50 border border-stone-800 rounded-xl py-3 pl-8 pr-4 text-right text-white focus:border-amber-500/50 focus:ring-amber-500/20 transition-all font-mono font-bold text-lg">
                                        </div>
                                    </div>

                                    <div class="pt-6 border-t border-white/10 mt-8">
                                        <div class="flex justify-between items-baseline">
                                            <span
                                                class="text-stone-400 text-xs font-black uppercase tracking-[0.2em]">Final
                                                Balanced Total</span>
                                            <span class="text-[10px] text-amber-500/60 font-medium">INR INCL. ALL
                                                TAXES</span>
                                        </div>
                                        <div class="flex justify-end mt-2">
                                            <div class="relative inline-block">
                                                <div
                                                    class="absolute inset-0 bg-amber-500 blur-[20px] opacity-20 animate-pulse">
                                                </div>
                                                <span id="summaryTotal"
                                                    class="relative text-5xl font-black text-amber-400 tracking-tighter font-serif drop-shadow-md">₹0.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-12 space-y-4">
                                    <button type="submit"
                                        class="w-full relative group overflow-hidden bg-gradient-to-r from-amber-500 to-amber-600 p-[1px] rounded-2xl transition-all duration-300 hover:scale-[1.02] active:scale-95 shadow-lg shadow-amber-500/20">
                                        <div
                                            class="w-full bg-amber-500 py-4 px-8 rounded-2xl font-black text-stone-950 flex justify-center items-center gap-2 group-hover:bg-amber-400 transition-colors">
                                            <svg class="w-5 h-5 text-stone-950 group-hover:rotate-12 transition-transform"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span class="uppercase tracking-widest text-sm">Finalize & Generate</span>
                                        </div>
                                    </button>

                                    <a href="{{ route('admin.orders.index') }}"
                                        class="w-full block text-center text-stone-500 hover:text-white font-bold py-3 transition-colors text-[10px] uppercase tracking-widest">
                                        Discard Changes
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <script>
        window.productsData = @json($productsJson);
    </script>
    <script src="{{ asset('js/admin-order-create.js') }}"></script>
    @endpush
</x-app-layout>
