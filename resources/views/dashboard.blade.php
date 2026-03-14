<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-stone-900 leading-tight font-serif">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 mt-4 lg:grid-cols-4 gap-6">

                <!-- Total Revenue -->
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
                </div>

                <!-- Total Orders -->
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
                </div>

                <!-- Total Customers -->
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
                </div>

                <!-- Low Stock Alerts -->
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

            <!-- Welcome Board and Quick Links -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-stone-100">
                <div
                    class="p-8 lg:p-12 text-stone-900 flex flex-col items-center justify-center text-center min-h-[300px]">
                    <h3 class="text-3xl font-bold font-serif text-stone-900 mb-4">Welcome back, {{ Auth::user()->name }}
                    </h3>
                    <p class="text-stone-500 text-lg max-w-2xl mx-auto mb-8">
                        Your admin panel is ready. Manage inventory, view customer orders, generate invoices, and
                        publish new stories to your blog.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        @if(Auth::user()->hasAdminPermission('orders'))
                        <a href="{{ route('admin.orders.create') }}"
                            class="px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white font-bold rounded-xl transition shadow-sm flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                            Create Invoice
                        </a>
                        @endif
                        @if(Auth::user()->hasAdminPermission('products'))
                        <a href="{{ route('admin.products.index') }}"
                            class="px-6 py-3 border border-stone-200 text-stone-600 hover:border-amber-300 hover:text-amber-600 font-bold rounded-xl transition flex items-center gap-2">
                            Manage Inventory
                        </a>
                        @endif
                        @if(Auth::user()->hasAdminPermission('users'))
                        <a href="{{ route('admin.users.index') }}"
                            class="px-6 py-3 border border-stone-200 text-stone-600 hover:border-amber-300 hover:text-amber-600 font-bold rounded-xl transition flex items-center gap-2">
                            Manage Users
                        </a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
