<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="font-bold text-2xl text-stone-900 leading-tight font-serif">
                {{ __('Admin Users') }}
            </h2>
            <a href="{{ route('admin.users.create') }}"
                class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2.5 px-6 rounded-xl transition shadow-sm whitespace-nowrap flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                New User
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl border border-stone-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-stone-50 border-b border-stone-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">User</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">Access Type</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest hidden lg:table-cell">Permissions</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-stone-500 uppercase tracking-widest">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100">
                            @forelse($users as $user)
                            <tr class="hover:bg-stone-50 transition">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-stone-900">{{ $user->name }}</div>
                                    <div class="text-sm text-stone-500">{{ $user->email }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($user->is_super_admin)
                                    <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold text-emerald-700">Full Admin</span>
                                    @else
                                    <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-bold text-amber-700">Standard User</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 hidden lg:table-cell">
                                    <div class="flex flex-wrap gap-2">
                                        @forelse($user->admin_permissions ?? [] as $permission)
                                        <span class="rounded-full bg-stone-100 px-3 py-1 text-xs font-semibold text-stone-600">
                                            {{ \App\Models\User::adminPermissionOptions()[$permission] ?? $permission }}
                                        </span>
                                        @empty
                                        <span class="text-sm text-stone-400 italic">No module access</span>
                                        @endforelse
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex gap-4">
                                        <a href="{{ route('admin.users.edit', $user) }}" class="text-amber-600 hover:text-amber-800 font-semibold">Edit</a>
                                        @if(auth()->id() !== $user->id)
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Delete</button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-stone-400">
                                    No users found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-6 border-t border-stone-100">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
