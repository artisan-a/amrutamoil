<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Article') }}
            </h2>
            <div class="flex gap-4">
                <a href="{{ route('blog.show', $blog->slug) }}" target="_blank"
                    class="text-amber-600 hover:text-amber-800 font-semibold text-sm transition">View Live ↗</a>
                <a href="{{ route('admin.blog.index') }}"
                    class="text-gray-500 hover:text-gray-700 font-medium transition">&larr; Back to Blog</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">

        <form action="{{ route('admin.blog.update', $blog) }}" method="POST"
            class="bg-white rounded-2xl border border-stone-100 shadow-sm p-8 space-y-6">
            @csrf @method('PUT')
            @include('admin.blog._form')
            <div class="pt-4 border-t border-stone-100 flex gap-4">
                <button type="submit"
                    class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-8 rounded-xl transition">Update
                    Article</button>
                <a href="{{ route('admin.blog.index') }}"
                    class="border border-stone-200 text-stone-600 hover:text-stone-800 font-bold py-3 px-8 rounded-xl transition">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>