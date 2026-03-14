<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPermissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_without_admin_access_cannot_open_dashboard(): void
    {
        $user = User::factory()->create([
            'is_super_admin' => false,
            'admin_permissions' => [],
        ]);

        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertRedirect(route('home'))
            ->assertSessionHas('error', 'You do not have permission to access that page.');
    }

    public function test_standard_user_can_only_access_granted_admin_modules(): void
    {
        $user = User::factory()->create([
            'is_super_admin' => false,
            'admin_permissions' => ['customers'],
        ]);

        $this->actingAs($user)
            ->get(route('admin.customers.index'))
            ->assertOk();

        $this->actingAs($user)
            ->get(route('admin.orders.index'))
            ->assertRedirect(route('admin.customers.index'))
            ->assertSessionHas('error', 'You do not have permission to access that page.');
    }

    public function test_super_admin_can_access_user_management(): void
    {
        $user = User::factory()->create([
            'is_super_admin' => true,
        ]);

        $this->actingAs($user)
            ->get(route('admin.users.index'))
            ->assertOk();
    }
}
