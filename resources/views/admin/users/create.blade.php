<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-stone-900 leading-tight font-serif">
            {{ __('Create Admin User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.users.store') }}" method="POST"
                class="bg-white rounded-2xl border border-stone-100 shadow-sm p-8 space-y-6">
                @csrf
                @include('admin.users._form')

                <div class="flex items-center gap-4 pt-4 border-t border-stone-100">
                    <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-8 rounded-xl transition shadow-sm">
                        Save User
                    </button>
                    <a href="{{ route('admin.users.index') }}"
                        class="border border-stone-200 text-stone-600 hover:text-stone-800 font-bold py-3 px-8 rounded-xl transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
