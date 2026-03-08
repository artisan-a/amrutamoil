<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-stone-900 leading-tight font-serif">
            {{ __('Inquiries & Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl border border-stone-100 shadow-sm overflow-hidden">
                <table class="w-full">
                    <thead class="bg-stone-50 border-b border-stone-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                Date</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                Name</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                Contact</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                Product</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                Message</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @foreach($inquiries as $inquiry)
                        <tr class="hover:bg-stone-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-500">{{
                                $inquiry->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-stone-900">{{ $inquiry->name
                                }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600">
                                {{ $inquiry->phone }}<br />
                                <span class="text-xs text-stone-400">{{ $inquiry->email }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600">
                                <span class="bg-amber-100 text-amber-800 text-xs font-bold px-2.5 py-1 rounded-full">
                                    {{ $inquiry->product ? $inquiry->product->name . ' (' . $inquiry->product->size .
                                    ')' : 'General' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-stone-600">{{ Str::limit($inquiry->message, 50) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST"
                                    class="inline" onsubmit="return confirm('Delete this inquiry?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-500 hover:text-red-700 font-semibold transition">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-6 border-t border-stone-100">
                    {{ $inquiries->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>