<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create', [
            'permissionOptions' => User::adminPermissionOptions(),
        ]);
    }

    public function store(Request $request)
    {
        $allPermissions = array_keys(User::adminPermissionOptions());

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'admin_permissions' => ['nullable', 'array'],
            'admin_permissions.*' => ['string', Rule::in($allPermissions)],
        ]);

        $selectedPermissions = array_values(array_unique($validated['admin_permissions'] ?? []));
        $isSuperAdmin = $request->boolean('is_super_admin') || count($selectedPermissions) === count($allPermissions);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'email_verified_at' => now(),
            'is_super_admin' => $isSuperAdmin,
            'admin_permissions' => $isSuperAdmin ? $allPermissions : $selectedPermissions,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'permissionOptions' => User::adminPermissionOptions(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $allPermissions = array_keys(User::adminPermissionOptions());

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'confirmed', 'min:8'],
            'admin_permissions' => ['nullable', 'array'],
            'admin_permissions.*' => ['string', Rule::in($allPermissions)],
        ]);

        $selectedPermissions = array_values(array_unique($validated['admin_permissions'] ?? []));
        $isSuperAdmin = $request->boolean('is_super_admin') || count($selectedPermissions) === count($allPermissions);

        $payload = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'is_super_admin' => $isSuperAdmin,
            'admin_permissions' => $isSuperAdmin ? $allPermissions : $selectedPermissions,
        ];

        if (! empty($validated['password'])) {
            $payload['password'] = Hash::make($validated['password']);
        }

        $user->update($payload);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        abort_if(auth()->id() === $user->id, 422, 'You cannot delete your own account.');

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
