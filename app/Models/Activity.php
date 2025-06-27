<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable =[
        'name',
        'description',
        'trainer_id',
        'gym_room_id',
        'activity_type_id',
        'capacity',
    ];

    public function gymRoom() : BelongsTo
    {
        return $this->belongsTo(GymRoom::class, 'gym_room_id','id');
    }

    public function activityType() : BelongsTo
    {
        return $this->belongsTo(ActivityType::class, 'activity_type_id','id');
    }

    public function trainer() : BelongsTo
    {
        return $this->belongsTo(User::class, 'trainer_id','id');
    }
}
