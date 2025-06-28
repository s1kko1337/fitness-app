<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GymRoom extends Model
{
    protected $table = 'gym_rooms';

    protected $fillable = [
        'gym_id',
        'type_id',
        'name',
        'capacity',
        'description'
    ];

    public function gym(): BelongsTo
    {
        return $this->belongsTo(Gym::class, 'gym_id','id');
    }

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class, 'type_id','id');
    }
}
