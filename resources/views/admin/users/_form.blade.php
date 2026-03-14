<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <x-input-label for="name" value="Name" class="text-stone-700 font-bold" />
        <x-text-input id="name" name="name" type="text"
            class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
            :value="old('name', $user->name ?? '')" required />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="email" value="Email" class="text-stone-700 font-bold" />
        <x-text-input id="email" name="email" type="email"
            class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
            :value="old('email', $user->email ?? '')" required />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="password" :value="isset($user) ? 'New Password (Optional)' : 'Password'" class="text-stone-700 font-bold" />
        @if(isset($user))
        <x-text-input id="password" name="password" type="password"
            class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500" />
        @else
        <x-text-input id="password" name="password" type="password"
            class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
            required />
        @endif
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="password_confirmation" :value="isset($user) ? 'Confirm New Password' : 'Confirm Password'" class="text-stone-700 font-bold" />
        @if(isset($user))
        <x-text-input id="password_confirmation" name="password_confirmation" type="password"
            class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500" />
        @else
        <x-text-input id="password_confirmation" name="password_confirmation" type="password"
            class="mt-1 block w-full border-stone-200 rounded-xl focus:border-amber-500 focus:ring-amber-500"
            required />
        @endif
    </div>
</div>

<div class="rounded-2xl border border-stone-200 bg-stone-50 p-6">
    <label class="flex items-start gap-3">
        <input type="checkbox" name="is_super_admin" value="1" id="is_super_admin"
            @checked(old('is_super_admin', $user->is_super_admin ?? false))
            class="mt-1 h-5 w-5 rounded border-stone-300 text-amber-600 focus:ring-amber-500">
        <span>
            <span class="block text-sm font-bold text-stone-800">Full Admin Access</span>
            <span class="block mt-1 text-sm text-stone-500">Enable this for complete access to all admin modules, including user management.</span>
        </span>
    </label>
</div>

<div>
    <div class="flex items-center justify-between gap-4">
        <div>
            <h3 class="text-stone-800 font-bold text-lg">Module Permissions</h3>
            <p class="text-sm text-stone-500 mt-1">Choose which admin sections this user can access.</p>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach($permissionOptions as $permissionKey => $permissionLabel)
        <label class="flex items-start gap-3 rounded-2xl border border-stone-200 bg-white p-4 hover:border-amber-300 transition">
            <input type="checkbox" name="admin_permissions[]" value="{{ $permissionKey }}"
                data-permission-checkbox
                @checked(in_array($permissionKey, old('admin_permissions', $user->admin_permissions ?? []), true))
                class="mt-1 h-5 w-5 rounded border-stone-300 text-amber-600 focus:ring-amber-500">
            <span>
                <span class="block text-sm font-semibold text-stone-800">{{ $permissionLabel }}</span>
                <span class="block mt-1 text-xs text-stone-500">Allows access to the {{ strtolower($permissionLabel) }} section.</span>
            </span>
        </label>
        @endforeach
    </div>
    <x-input-error :messages="$errors->get('admin_permissions')" class="mt-2" />
</div>

@once
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const fullAdminCheckbox = document.getElementById('is_super_admin');
        const permissionCheckboxes = Array.from(document.querySelectorAll('[data-permission-checkbox]'));

        if (!fullAdminCheckbox || permissionCheckboxes.length === 0) {
            return;
        }

        const syncFullAdminFromPermissions = () => {
            fullAdminCheckbox.checked = permissionCheckboxes.every((checkbox) => checkbox.checked);
        };

        const syncPermissionsFromFullAdmin = () => {
            permissionCheckboxes.forEach((checkbox) => {
                checkbox.checked = fullAdminCheckbox.checked;
            });
        };

        permissionCheckboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', syncFullAdminFromPermissions);
        });

        fullAdminCheckbox.addEventListener('change', syncPermissionsFromFullAdmin);

        syncFullAdminFromPermissions();
    });
</script>
@endpush
@endonce
