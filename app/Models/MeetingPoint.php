<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeetingPoint extends Model
{
    protected $with = ['airport'];

    protected $fillable = [
        'airport_id',
        'title',
        'description',
        'latitude',
        'longitude',
    ];

    public function scopeWhereOperatorId($query, $operatorId)
    {
        return $query->where('operator_id', $operatorId);
    }

    public function airport()
    {
        return $this->belongsTo(Airport::class);
    }

    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id', 'id');
    }
}
