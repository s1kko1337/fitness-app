<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SessionFeedback extends Model
{
    protected $table = 'session_feedbacks';

    protected $fillable = [
        'booking_id',
        'client_id',
        'trainer_id',
        'rating',
        'comment',
    ];

    public function booking() : BelongsTo
    {
        return $this->belongsTo(Booking::class, 'booking_id', 'id');
    }

    public function client() : BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function trainer() : BelongsTo
    {
        return $this->belongsTo(User::class, 'trainer_id', 'id');
    }
}

