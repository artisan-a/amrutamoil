<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Blog Articles') }}
            </h2>
            <a href="{{ route('admin.blog.create') }}"
                class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2.5 px-6 rounded-xl transition">
                + New Article
            </a>
        </div>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 rounded-xl px-5 py-3 mb-6">{{ session('success')
            }}</div>
        @endif

        <div class="bg-white rounded-2xl border border-stone-100 shadow-sm overflow-hidden">
            <table class="w-full">
                <thead class="bg-stone-50 border-b border-stone-200">
                    <tr>
                        <th class="text-left text-xs font-bold text-stone-500 uppercase tracking-widest px-6 py-4">Title
                        </th>
                        <th class="text-left text-xs font-bold text-stone-500 uppercase tracking-widest px-4 py-4">
                            Category</th>
                        <th class="text-left text-xs font-bold text-stone-500 uppercase tracking-widest px-4 py-4">
                            Status</th>
                        <th class="text-left text-xs font-bold text-stone-500 uppercase tracking-widest px-4 py-4">Date
                        </th>
                        <th class="px-4 py-4"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($blogs as $blog)
                    <tr class="hover:bg-stone-50">
                        <td class="px-6 py-4">
                            <p class="font-semibold text-stone-900 text-sm line-clamp-2">{{ $blog->title }}</p>
                            <p class="text-stone-400 text-xs mt-1">/blog/{{ $blog->slug }}</p>
                        </td>
                        <td class="px-4 py-4">
                            <span class="bg-amber-100 text-amber-700 text-xs font-bold px-2.5 py-1 rounded-full">{{
                                $blog->category }}</span>
                        </td>
                        <td class="px-4 py-4">
                            @if($blog->is_published)
                            <span
                                class="bg-green-100 text-green-700 text-xs font-bold px-2.5 py-1 rounded-full">Published</span>
                            @else
                            <span
                                class="bg-stone-100 text-stone-600 text-xs font-bold px-2.5 py-1 rounded-full">Draft</span>
                            @endif
                        </td>
                        <td class="px-4 py-4 text-stone-500 text-sm">{{ $blog->published_at?->format('d M Y') ?? '—' }}
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex gap-3">
                                <a href="{{ route('blog.show', $blog->slug) }}" target="_blank"
                                    class="text-stone-400 hover:text-amber-600 text-xs font-semibold transition">View</a>
                                <a href="{{ route('admin.blog.edit', $blog) }}"
                                    class="text-amber-600 hover:text-amber-800 text-xs font-semibold transition">Edit</a>
                                <form action="{{ route('admin.blog.destroy', $blog) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Delete this article?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="text-red-500 hover:text-red-700 text-xs font-semibold transition">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-12 text-stone-400">No blog articles yet. Create your first
                            one!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">{{ $blogs->links() }}</div>
    </div>
</x-app-layout>