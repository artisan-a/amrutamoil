<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-stone-900 leading-tight font-serif">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @php
    $paidPercent = $totalOrders > 0 ? round(($paidOrdersCount / $totalOrders) * 100) : 0;
    $pendingPercent = $totalOrders > 0 ? round(($pendingOrdersCount / $totalOrders) * 100) : 0;
    $cancelledPercent = $totalOrders > 0 ? round(($cancelledOrdersCount / $totalOrders) * 100) : 0;
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-stone-100">
                <div class="p-8">
                    <p class="text-xs font-bold uppercase tracking-[0.25em] text-amber-600">Overview</p>
                    <h3 class="mt-3 text-3xl font-bold font-serif text-stone-900">Welcome back, {{ Auth::user()->name }}</h3>
                    <p class="mt-3 text-stone-500 text-base max-w-2xl">
                        Monitor revenue, customer growth, payment status, and product performance from one place.
                    </p>

                    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="rounded-2xl border border-stone-100 bg-stone-50 p-5">
                            <p class="text-xs font-bold uppercase tracking-[0.2em] text-stone-500">This Month Revenue</p>
                            <p class="mt-3 text-3xl font-black text-stone-900 font-serif">₹{{ number_format($currentMonthRevenue, 2) }}</p>
                        </div>

                        <div class="rounded-2xl border border-stone-100 bg-stone-50 p-5">
                            <p class="text-xs font-bold uppercase tracking-[0.2em] text-stone-500">Paid Orders</p>
                            <p class="mt-3 text-3xl font-black text-stone-900 font-serif">{{ number_format($paidOrdersCount) }}</p>
                        </div>

                        <div class="rounded-2xl border border-stone-100 bg-stone-50 p-5">
                            <p class="text-xs font-bold uppercase tracking-[0.2em] text-stone-500">Pending Orders</p>
                            <p class="mt-3 text-3xl font-black text-stone-900 font-serif">{{ number_format($pendingOrdersCount) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <div
                    class="bg-white rounded-2xl border border-stone-100 shadow-sm p-6 flex flex-col items-center justify-center text-center relative overflow-hidden group">
                    <div
                        class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-amber-400 to-amber-600 scale-x-0 group-hover:scale-x-100 transition-transform origin-left">
                    </div>
                    <div
                        class="w-12 h-12 bg-amber-50 text-amber-500 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-stone-500 font-bold text-sm uppercase tracking-wider mb-1">Total Revenue</h3>
                    <p class="text-3xl font-black text-stone-900 font-serif">₹{{ number_format($totalRevenue, 2) }}</p>
                    <p class="mt-2 text-xs font-medium text-stone-400">This month: ₹{{ number_format($currentMonthRevenue, 2) }}</p>
                </div>

                <div
                    class="bg-white rounded-2xl border border-stone-100 shadow-sm p-6 flex flex-col items-center justify-center text-center relative overflow-hidden group">
                    <div
                        class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-blue-400 to-blue-600 scale-x-0 group-hover:scale-x-100 transition-transform origin-left">
                    </div>
                    <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-stone-500 font-bold text-sm uppercase tracking-wider mb-1">Total Orders</h3>
                    <p class="text-3xl font-black text-stone-900 font-serif">{{ number_format($totalOrders) }}</p>
                    <p class="mt-2 text-xs font-medium text-stone-400">{{ $pendingOrdersCount }} pending / {{ $paidOrdersCount }} paid</p>
                </div>

                <div
                    class="bg-white rounded-2xl border border-stone-100 shadow-sm p-6 flex flex-col items-center justify-center text-center relative overflow-hidden group">
                    <div
                        class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-emerald-400 to-emerald-600 scale-x-0 group-hover:scale-x-100 transition-transform origin-left">
                    </div>
                    <div
                        class="w-12 h-12 bg-emerald-50 text-emerald-500 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-stone-500 font-bold text-sm uppercase tracking-wider mb-1">Customers</h3>
                    <p class="text-3xl font-black text-stone-900 font-serif">{{ number_format($totalCustomers) }}</p>
                    <p class="mt-2 text-xs font-medium text-stone-400">Active customer database</p>
                </div>

                <div
                    class="bg-white rounded-2xl border border-stone-100 shadow-sm p-6 flex flex-col items-center justify-center text-center relative overflow-hidden group">
                    <div
                        class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-rose-400 to-rose-600 scale-x-0 group-hover:scale-x-100 transition-transform origin-left">
                    </div>
                    <div
                        class="w-12 h-12 {{ $lowStockCount > 0 ? 'bg-rose-50 text-rose-500' : 'bg-stone-50 text-stone-400' }} rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-stone-500 font-bold text-sm uppercase tracking-wider mb-1">Low Stock Products</h3>
                    <p
                        class="text-3xl font-black {{ $lowStockCount > 0 ? 'text-rose-600' : 'text-stone-900' }} font-serif">
                        {{ number_format($lowStockCount) }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                <div class="bg-stone-900 text-white rounded-2xl border border-stone-800 shadow-sm overflow-hidden">
                    <div class="p-8">
                        <p class="text-xs font-bold uppercase tracking-[0.25em] text-amber-400">Order Mix</p>
                        <h3 class="mt-3 text-3xl font-bold font-serif">Payment Status</h3>

                        <div class="mt-8 space-y-5">
                            <div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-stone-300">Paid</span>
                                    <span class="font-bold">{{ $paidOrdersCount }} ({{ $paidPercent }}%)</span>
                                </div>
                                <div class="mt-2 h-2 rounded-full bg-white/10 overflow-hidden">
                                    <div class="h-full bg-emerald-400" style="width: {{ $paidPercent }}%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-stone-300">Pending</span>
                                    <span class="font-bold">{{ $pendingOrdersCount }} ({{ $pendingPercent }}%)</span>
                                </div>
                                <div class="mt-2 h-2 rounded-full bg-white/10 overflow-hidden">
                                    <div class="h-full bg-amber-400" style="width: {{ $pendingPercent }}%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-stone-300">Cancelled</span>
                                    <span class="font-bold">{{ $cancelledOrdersCount }} ({{ $cancelledPercent }}%)</span>
                                </div>
                                <div class="mt-2 h-2 rounded-full bg-white/10 overflow-hidden">
                                    <div class="h-full bg-rose-400" style="width: {{ $cancelledPercent }}%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 rounded-2xl border border-white/10 bg-white/5 p-5">
                            <p class="text-xs font-bold uppercase tracking-[0.2em] text-stone-400">Snapshot</p>
                            <div class="mt-4 grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-stone-400 text-xs uppercase tracking-widest">Invoices</p>
                                    <p class="mt-1 text-2xl font-bold">{{ $totalOrders }}</p>
                                </div>
                                <div>
                                    <p class="text-stone-400 text-xs uppercase tracking-widest">Customers</p>
                                    <p class="mt-1 text-2xl font-bold">{{ $totalCustomers }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="xl:col-span-2 bg-white rounded-2xl border border-stone-100 shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-stone-100">
                        <h3 class="text-xl font-bold font-serif text-stone-900">Top Products</h3>
                        <p class="text-sm text-stone-500 mt-1">Best sellers by quantity sold</p>
                    </div>

                    <div class="divide-y divide-stone-100">
                        @forelse($topProducts as $item)
                        <div class="px-6 py-4 flex items-center justify-between gap-4">
                            <div>
                                <p class="font-bold text-stone-900">{{ $item->product?->name ?? 'Unknown Product' }}</p>
                                <p class="text-sm text-stone-500 mt-1">{{ $item->product?->size }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-stone-900">{{ number_format($item->total_quantity) }} units</p>
                                <p class="text-sm text-stone-500 mt-1">₹{{ number_format($item->total_sales, 2) }}</p>
                            </div>
                        </div>
                        @empty
                        <div class="px-6 py-10 text-center text-stone-400">No product sales recorded yet.</div>
                        @endforelse
                    </div>
                </div>
            </div>

            @if($lowStockProducts->isNotEmpty())
            <div class="bg-white rounded-2xl border border-stone-100 shadow-sm overflow-hidden">
                <div class="px-6 py-5 border-b border-stone-100">
                    <h3 class="text-xl font-bold font-serif text-stone-900">Low Stock Watchlist</h3>
                    <p class="text-sm text-stone-500 mt-1">Products that may need restocking soon</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-0 divide-y md:divide-y-0 md:divide-x divide-stone-100">
                    @foreach($lowStockProducts as $product)
                    <div class="p-6">
                        <p class="font-bold text-stone-900">{{ $product->name }}</p>
                        <p class="text-sm text-stone-500 mt-1">{{ $product->size }}</p>
                        <div class="mt-4 inline-flex rounded-full px-3 py-1 text-xs font-bold {{ $product->stock_quantity <= 0 ? 'bg-rose-100 text-rose-700' : 'bg-amber-100 text-amber-700' }}">
                            {{ $product->stock_quantity }} left
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>
