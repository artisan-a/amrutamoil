<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center gap-4">
            <h2 class="font-bold text-2xl text-stone-900 leading-tight font-serif">
                {{ __('Advertisements') }}
            </h2>
            <a href="{{ route('admin.advertisements.create') }}"
                class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2.5 px-6 rounded-xl transition shadow-sm">
                + Add Advertisement
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl border border-stone-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[900px]">
                        <thead class="bg-stone-50 border-b border-stone-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">Image</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">Title</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">Start Date</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">End Date</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100">
                            @forelse($advertisements as $advertisement)
                            <tr class="hover:bg-stone-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($advertisement->image)
                                    <img src="{{ asset('storage/' . $advertisement->image) }}" alt="Advertisement"
                                        class="h-14 w-24 object-cover rounded-lg border border-stone-200">
                                    @else
                                    <div class="h-14 w-24 rounded-lg border border-dashed border-stone-300 text-xs text-stone-400 flex items-center justify-center">
                                        No image
                                    </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-stone-900 font-semibold">{{ $advertisement->title }}</td>
                                <td class="px-6 py-4">
                                    @if($advertisement->status === 'active')
                                    <span class="bg-green-100 text-green-700 text-xs font-bold px-2.5 py-1 rounded-full">Active</span>
                                    @else
                                    <span class="bg-stone-100 text-stone-600 text-xs font-bold px-2.5 py-1 rounded-full">Inactive</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-stone-600 text-sm">{{ optional($advertisement->start_date)->format('d M, Y') }}</td>
                                <td class="px-6 py-4 text-stone-600 text-sm">{{ optional($advertisement->end_date)->format('d M, Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3 text-sm font-semibold">
                                        <a href="{{ route('admin.advertisements.edit', $advertisement) }}" class="text-amber-600 hover:text-amber-800 transition">Edit</a>

                                        <form action="{{ route('admin.advertisements.toggle', $advertisement) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-blue-600 hover:text-blue-800 transition">
                                                {{ $advertisement->status === 'active' ? 'Deactivate' : 'Activate' }}
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.advertisements.destroy', $advertisement) }}" method="POST" class="inline-block"
                                            onsubmit="return confirm('Delete this advertisement?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 transition">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-stone-500">
                                    No advertisements found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-6 border-t border-stone-100">
                    {{ $advertisements->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
