<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-stone-900 leading-tight font-serif">
            {{ __('Contact Messages') }}
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
                                Phone</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                Message</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @foreach($contacts as $contact)
                        <tr class="hover:bg-stone-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-500">{{
                                $contact->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-stone-900">{{ $contact->name
                                }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600">{{ $contact->phone }}</td>
                            <td class="px-6 py-4 text-sm text-stone-600">{{ $contact->message }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST"
                                    class="inline" onsubmit="return confirm('Delete this message?');">
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
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>