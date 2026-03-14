<?php

namespace App\Models;

use App\Notifications\AdminResetPassword;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_super_admin',
        'admin_permissions',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_super_admin' => 'boolean',
            'admin_permissions' => 'array',
        ];
    }

    public static function adminPermissionOptions(): array
    {
        return config('admin_permissions', []);
    }

    public function canAccessAdminPanel(): bool
    {
        return $this->is_super_admin || ! empty($this->admin_permissions);
    }

    public function hasAdminPermission(string $permission): bool
    {
        if ($this->is_super_admin) {
            return true;
        }

        return in_array($permission, $this->admin_permissions ?? [], true);
    }

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new AdminResetPassword($token));
    }
}
