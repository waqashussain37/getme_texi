<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    public function prices()
    {
        return $this->hasMany(Price::class, 'airport_code', 'code', \App\Nova\Price::class);
    }

    public function meetingPoints()
    {
        return $this->hasMany(MeetingPoint::class);
    }

    public function operators()
    {
        return $this->belongsToMany(User::class, 'user_airports');
    }
}
