<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $table = 'bookings';

    protected $fillable = [
        'client_id',
        'schedule_id',
        'is_visited',
        'personal_notes'
    ];

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }
}
