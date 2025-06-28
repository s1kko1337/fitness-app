<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = [
        'activity_id',
        'start_time',
        'end_time',
        'room_reserved',
    ];

    public function bookings() : HasMany
    {
        return $this->hasMany(Booking::class, 'schedule_id', 'id');
    }

    public function activity() : BelongsTo
    {
        return $this->belongsTo(Activity::class, 'activity_id', 'id');
    }
}
