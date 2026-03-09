<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <x-input-label for="title" value="Advertisement Title" class="text-stone-700 font-bold" />
        <x-text-input id="title" name="title" type="text"
            class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
            :value="old('title', $advertisement->title ?? '')" required />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <div>
        <x-input-label value="Type" class="text-stone-700 font-bold" />
        <div
            class="mt-1 block w-full border border-stone-200 rounded-xl px-3 py-2.5 bg-stone-50 text-stone-600 font-semibold">
            Popup
        </div>
        <input type="hidden" name="type" value="popup">
    </div>

    <div>
        <x-input-label for="button_text" value="Button Text (Optional)" class="text-stone-700 font-bold" />
        <x-text-input id="button_text" name="button_text" type="text"
            class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
            :value="old('button_text', $advertisement->button_text ?? '')" />
        <x-input-error :messages="$errors->get('button_text')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="redirect_url" value="Redirect Link (Optional)" class="text-stone-700 font-bold" />
        <x-text-input id="redirect_url" name="redirect_url" type="text"
            class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
            :value="old('redirect_url', $advertisement->redirect_url ?? '')" placeholder="https://example.com or /products" />
        <x-input-error :messages="$errors->get('redirect_url')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="start_date" value="Start Date" class="text-stone-700 font-bold" />
        <x-text-input id="start_date" name="start_date" type="date"
            class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
            :value="old('start_date', isset($advertisement) && $advertisement->start_date ? $advertisement->start_date->format('Y-m-d') : '')"
            required />
        <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="end_date" value="End Date" class="text-stone-700 font-bold" />
        <x-text-input id="end_date" name="end_date" type="date"
            class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
            :value="old('end_date', isset($advertisement) && $advertisement->end_date ? $advertisement->end_date->format('Y-m-d') : '')"
            required />
        <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
    </div>
</div>

<div>
    <x-input-label for="description" value="Description (Optional)" class="text-stone-700 font-bold" />
    <textarea id="description" name="description"
        class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500 shadow-sm"
        rows="4">{{ old('description', $advertisement->description ?? '') }}</textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

<div>
    <x-input-label for="image"
        :value="isset($advertisement) ? 'Upload Image (Optional, leave blank to keep current)' : 'Upload Image'"
        class="text-stone-700 font-bold" />
    <input id="image" name="image" type="file" accept="image/*"
        class="mt-1 block w-full text-sm text-stone-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100" />
    <x-input-error :messages="$errors->get('image')" class="mt-2" />

    @if(isset($advertisement) && $advertisement->image)
    <div class="mt-3">
        <span class="text-xs text-stone-500">Current Image:</span>
        <img src="{{ asset('storage/' . $advertisement->image) }}" alt="Advertisement image"
            class="h-20 w-32 object-cover rounded-lg border border-stone-200 mt-1">
    </div>
    @endif
</div>

<div>
    <x-input-label for="status" value="Status" class="text-stone-700 font-bold" />
    <select id="status" name="status"
        class="mt-1 block w-full md:w-56 border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500" required>
        <option value="active" @selected(old('status', $advertisement->status ?? 'active') === 'active')>Active</option>
        <option value="inactive" @selected(old('status', $advertisement->status ?? 'active') === 'inactive')>Inactive</option>
    </select>
    <x-input-error :messages="$errors->get('status')" class="mt-2" />
</div>
