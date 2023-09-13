<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, Billable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'driver_license',
        'name',
        'email',
        'password',
        'role',
        'phone_number',
        'vehicle_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return BelongsTo
     */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function meetingPoints()
    {
        return $this->hasMany(MeetingPoint::class, 'operator_id', 'id');
    }

    public function cars()
    {
        return $this->hasMany(Car::class, 'operator_id', 'id');
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class, 'operator_id', 'id');
    }

    public function airports()
    {
        return $this->belongsToMany(Airport::class, 'user_airports');
    }

    public function prices()
    {
        return $this->hasMany(Price::class, 'operator_id', 'id');
    }
}
