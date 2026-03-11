<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-stone-900 leading-tight font-serif">
            {{ __('Ticker Advertisement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.advertisements.ticker.update') }}" method="POST"
                class="bg-white rounded-2xl border border-stone-100 shadow-sm p-8 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="title" value="Ticker Message" class="text-stone-700 font-bold" />
                    <x-text-input id="title" name="title" type="text"
                        class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
                        :value="old('title', $ticker->title ?? '')"
                        placeholder="Example: Summer Offer - Flat 20% Off on all 5L tins" required />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="redirect_url" value="Ticker Link (Optional)" class="text-stone-700 font-bold" />
                    <x-text-input id="redirect_url" name="redirect_url" type="text"
                        class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
                        :value="old('redirect_url', $ticker->redirect_url ?? '')" placeholder="https://example.com or /products" />
                    <x-input-error :messages="$errors->get('redirect_url')" class="mt-2" />
                    <p class="mt-2 text-xs text-stone-500">When this link is set, clicking ticker text opens this URL.</p>
                </div>

                <div>
                    <x-input-label for="status" value="Ticker Status" class="text-stone-700 font-bold" />
                    <select id="status" name="status"
                        class="mt-1 block w-full md:w-56 border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500" required>
                        <option value="active" @selected(old('status', $ticker->status ?? 'inactive') === 'active')>Enabled</option>
                        <option value="inactive" @selected(old('status', $ticker->status ?? 'inactive') === 'inactive')>Disabled</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>

                <div class="rounded-xl border border-stone-200 bg-stone-50 p-4 text-sm text-stone-600">
                    If enabled, this custom ticker message appears in the black moving bar on the home page. If disabled,
                    the default stats ticker will be shown automatically.
                </div>

                <div class="flex items-center gap-4 pt-4 border-t border-stone-100">
                    <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-8 rounded-xl transition shadow-sm">
                        Save Ticker
                    </button>
                    <a href="{{ route('admin.advertisements.index') }}"
                        class="border border-stone-200 text-stone-600 hover:text-stone-800 font-bold py-3 px-8 rounded-xl transition">
                        Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
