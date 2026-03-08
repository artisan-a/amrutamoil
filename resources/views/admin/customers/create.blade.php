<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.customers.index') }}" class="text-stone-400 hover:text-stone-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="font-bold text-2xl text-stone-900 leading-tight font-serif">
                {{ __('New Customer') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.customers.store') }}" method="POST"
                class="bg-white rounded-2xl border border-stone-100 shadow-sm overflow-hidden">
                @csrf

                <div class="p-8 space-y-8">
                    <!-- Basic Info Section -->
                    <div>
                        <h3 class="text-lg font-bold text-stone-900 mb-4 pb-2 border-b border-stone-100">Basic
                            Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <x-input-label for="customer_name" value="Full Name *"
                                    class="text-stone-700 font-bold" />
                                <x-text-input id="customer_name" name="customer_name" type="text"
                                    class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
                                    required placeholder="Enter customer name" />
                            </div>
                            <div>
                                <x-input-label for="phone" value="Phone Number" class="text-stone-700 font-bold" />
                                <x-text-input id="phone" name="phone" type="tel"
                                    class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
                                    placeholder="e.g., +91 9876543210" />
                            </div>
                            <div>
                                <x-input-label for="email" value="Email Address" class="text-stone-700 font-bold" />
                                <x-text-input id="email" name="email" type="email"
                                    class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
                                    placeholder="e.g., mail@example.com" />
                            </div>
                        </div>
                    </div>

                    <!-- Address Section -->
                    <div>
                        <h3 class="text-lg font-bold text-stone-900 mb-4 pb-2 border-b border-stone-100">Location</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <x-input-label for="address" value="Street Address" class="text-stone-700 font-bold" />
                                <textarea id="address" name="address"
                                    class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500 shadow-sm"
                                    rows="2" placeholder="Start typing address..."></textarea>
                            </div>
                            <div>
                                <x-input-label for="city" value="City" class="text-stone-700 font-bold" />
                                <x-text-input id="city" name="city" type="text"
                                    class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500" />
                            </div>
                            <div>
                                <x-input-label for="state" value="State" class="text-stone-700 font-bold" />
                                <x-text-input id="state" name="state" type="text"
                                    class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500" />
                            </div>
                            <div>
                                <x-input-label for="pincode" value="PIN / Postal Code"
                                    class="text-stone-700 font-bold" />
                                <x-text-input id="pincode" name="pincode" type="text"
                                    class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-stone-50 px-8 py-4 flex items-center justify-end gap-4 border-t border-stone-100">
                    <a href="{{ route('admin.customers.index') }}"
                        class="text-stone-500 hover:text-stone-700 font-bold transition">
                        Cancel
                    </a>
                    <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2.5 px-8 rounded-xl transition shadow-sm">
                        Save Customer
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>