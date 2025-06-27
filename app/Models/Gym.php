<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Gym extends Model
{
    protected $table = 'gyms';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'owner_id',
        'email'
    ];

    public function owner(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'owner_id');
    }
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'gym_id', 'id');
    }

    public function gymRooms(): HasMany
    {
        return $this->hasMany(GymRoom::class, 'gym_id', 'id');
    }
}
