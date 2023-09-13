<?php

namespace App\Models;

use App\Support\DistanceMatrix;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property $vehicle_id
 * @property $journey_type
 * @property $pick_up_location
 * @property $drop_off_location
 * @property $pick_up_date
 * @property $pick_up_time
 * @property $return_pick_up_location
 * @property $payment_id
 * @property $driver_id
 * @property $is_paid
 * @property $has_failed
 * @property $vehicle
 * @property $first_name
 * @property $last_name
 * @property $phone_number
 * @property $email
 */
class Booking extends Model
{
    protected $with = ['vehicle', 'extras'];

    protected $fillable = [
        'vehicle_id',
        'journey_type',
        'pick_up_location',
        'pick_up_location_coords',
        'drop_off_location',
        'drop_off_location_coords',
        'pick_up_date',
        'pick_up_time',
        'passengers',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'return_pick_up_location',
        'return_pick_up_date',
        'return_pick_up_time',
        'luggage',
        'flight_number',
        'pick_up_location_post_code',
        'drop_off_location_post_code',
        'meeting_point_id',
        'driver_id',
        'car_id',
        'post_code_id',
        'status',
    ];

    protected $casts = [
        'pick_up_location_coords' => 'json',
        'drop_off_location_coords' => 'json',
    ];

    public function scopeUnpaid($query)
    {
        return $query->where('is_paid', false);
    }

    public function scopePaid($query)
    {
        return $query->where('is_paid', true);
    }

    public function postCode()
    {
        return $this->belongsTo(PostCode::class, 'post_code_id', 'code');
    }

    public function getPickUpDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getReturnPickUpDateAttribute($value)
    {
        if ($this->return_pick_up_location) {
            return Carbon::parse($value)->format('d/m/Y');
        }
        return null;
    }

    public function getReturnPickUpTimeAttribute($value)
    {
        if ($this->return_pick_up_location) {
            return $value;
        }
        return null;
    }

    public function getFareAttribute()
    {
        if (!$this->vehicle) {
            return 0;
        }

        return $this->getFare($this->vehicle->id);
    }

    public function getFare($vehicleId)
    {
        $fare = 0;
        $vehicle = Car::find($vehicleId);

        $isAirportDropOff = Price::whereAirportCode($this->drop_off_location_post_code)
            ->wherePostCode($this->pick_up_location_post_code)
            ->whereCarType($vehicle->type)
            ->whereDirection('drop_off')
            ->whereOperatorId($vehicle->operator->id)
            ->first();

        $isAirportPickUp = Price::whereAirportCode($this->pick_up_location_post_code)
            ->wherePostCode($this->drop_off_location_post_code)
            ->whereCarType($vehicle->type)
            ->whereDirection('pick_up')
            ->whereOperatorId($vehicle->operator->id)
            ->first();

        if ($isAirportDropOff) {
            $fare = $isAirportDropOff->value;
        } elseif ($isAirportPickUp) {
            $fare = $isAirportPickUp->value;
        }

        $returnPrice = null;
        if ($this->return_pick_up_location) {
            if ($isAirportDropOff) {
                $returnPrice = Price::whereAirportCode($this->drop_off_location_post_code)
                    ->wherePostCode($this->pick_up_location_post_code)
                    ->whereCarType($vehicle->type)
                    ->whereDirection('drop_off')
                    ->whereOperatorId($vehicle->operator->id)
                    ->first();
            } elseif ($isAirportPickUp) {
                $returnPrice = Price::whereAirportCode($this->pick_up_location_post_code)
                    ->wherePostCode($this->drop_off_location_post_code)
                    ->whereCarType($vehicle->type)
                    ->whereDirection('drop_off')
                    ->whereOperatorId($vehicle->operator->id)
                    ->first();
            }

            if($returnPrice) {
                $fare += $returnPrice->value;
            }
        }

        // Add a 12% tax to the fare
        $fare += $fare * (12 / 100);

        return round($fare, 2);
    }

    public function getExtrasTotalAttribute()
    {
        $extrasTotal = 0;

        foreach ($this->extras as $bookingExtra) {
            $extrasTotal = $extrasTotal + $bookingExtra->extra->price;
        }

        return round($extrasTotal, 2);
    }

    public function getTotalAttribute()
    {
        $fare = $this->fare;

        return round($fare + $this->extras_total, 2);
    }

    public function hasExtra($id)
    {
        if ($this->extras()->where('extra_id', $id)->first()) {
            return true;
        }
        return false;
    }

    public function getFareForVehicle($vehicleId)
    {
        return $this->getFare($vehicleId);
    }

    /**
     * @return BelongsTo
     */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    /**
     * @return HasMany
     */
    public function extras(): HasMany
    {
        return $this->hasMany(BookingExtra::class);
    }

    /**
     * @return BelongsTo
     */
    public function meetingPoint(): BelongsTo
    {
        return $this->belongsTo(MeetingPoint::class);
    }

    /**
     * @return BelongsTo
     */
    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    /**
     * @return BelongsTo
     */
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
