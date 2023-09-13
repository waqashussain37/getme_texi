<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'name',
        'phone_number',
    ];

    protected $withCount = ['bookings'];

    public function scopeWhereOperatorId($query, $operatorId)
    {
        return $query->where('operator_id', $operatorId);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
