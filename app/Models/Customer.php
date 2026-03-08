<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_name',
        'phone',
        'email',
        'address',
        'city',
        'state',
        'pincode',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}