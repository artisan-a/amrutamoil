<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="font-bold text-2xl text-stone-900 leading-tight font-serif">
                {{ __('Customers') }}
            </h2>
            <div class="flex gap-4 w-full sm:w-auto">
                <form action="{{ route('admin.customers.index') }}" method="GET" class="flex-1 sm:w-64">
                    <div class="relative">
                        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search customers..."
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border-stone-200 focus:border-amber-500 focus:ring-amber-500 shadow-sm text-sm">
                        <div class="absolute left-3 top-3 text-stone-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </form>
                <a href="{{ route('admin.customers.create') }}"
                    class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2.5 px-6 rounded-xl transition shadow-sm whitespace-nowrap flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    New Customer
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
                                    class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest cursor-pointer hover:text-stone-700 transition">
                                    Customer</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest hidden sm:table-cell">
                                    Contact</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest hidden md:table-cell">
                                    Location</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100">
                            @forelse($customers as $customer)
                            <tr class="hover:bg-stone-50 transition group">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-bold text-stone-900">{{ $customer->customer_name }}</div>
                                    <div class="text-sm text-stone-500 sm:hidden">{{ $customer->phone }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap hidden sm:table-cell">
                                    @if($customer->phone)
                                    <div class="text-stone-700 font-medium">{{ $customer->phone }}</div>
                                    @endif
                                    @if($customer->email)
                                    <div class="text-stone-500 text-sm">{{ $customer->email }}</div>
                                    @endif
                                    @if(!$customer->phone && !$customer->email)
                                    <span class="text-stone-400 italic text-sm">Not provided</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 hidden md:table-cell">
                                    @if($customer->city || $customer->state)
                                    <span class="text-stone-600 block truncate max-w-[200px]">
                                        {{ collect([$customer->city, $customer->state])->filter()->join(', ') }}
                                    </span>
                                    @else
                                    <span class="text-stone-400 italic text-sm">Not provided</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div
                                        class="flex gap-4 opacity-100 transition duration-200">
                                        <a href="{{ route('admin.customers.edit', $customer) }}"
                                            class="text-amber-600 hover:text-amber-800 font-semibold inline-flex items-center gap-1">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('Delete this customer? This action cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700 font-semibold inline-flex items-center gap-1">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="text-stone-400 mb-2">
                                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="text-stone-500 font-medium text-lg">No customers found</p>
                                    <p class="text-stone-400 text-sm mt-1">Add a new customer to get started.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-6 border-t border-stone-100">
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
