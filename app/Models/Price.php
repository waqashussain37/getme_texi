<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'airport_code',
        'post_code',
        'car_type',
        'value',
        'direction',
        'operator_id',
    ];

    public function scopeWhereAirportCode($query, $airportCode)
    {
        return $query->where('airport_code', $airportCode);
    }

    public function scopeWherePostCode($query, $postCode)
    {
        return $query->where('post_code', $postCode);
    }

    public function scopeWhereCarType($query, $carType)
    {
        return $query->where('car_type', $carType);
    }

    public function scopeWhereDirection($query, $direction)
    {
        return $query->where('direction', $direction);
    }
}
