<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingExtra extends Model
{
    protected $fillable = [
        'booking_id',
        'extra_id',
    ];

    /**
     * @return BelongsTo
     */
    public function extra(): BelongsTo
    {
        return $this->belongsTo(Extra::class);
    }
}
