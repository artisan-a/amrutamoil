<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'message',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}