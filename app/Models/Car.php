<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'type',
        'make',
        'model',
        'license_plate',
        'max_passengers',
        'max_luggage',
    ];

    protected $withCount = ['bookings'];

    public function scopeWhereOperatorId($query, $operatorId)
    {
        return $query->where('operator_id', $operatorId);
    }

    public function operator()
    {
        return $this->belongsTo(User::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
