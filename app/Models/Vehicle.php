<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'image',
        'type',
        'name',
        'description',
        'passengers',
        'luggage',
        'is_active',
    ];

    public function scopeHasImage($query)
    {
        return $query->whereNotNull('image');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
