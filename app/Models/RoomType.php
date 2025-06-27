<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomType extends Model
{
    protected $table = 'room_types';

    protected $fillable = [
        'type',
    ];

    public function gymRooms(): HasMany
    {
        return $this->hasMany(GymRoom::class, 'type_id','id');
    }
}
