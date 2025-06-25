<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gym extends Model
{
    protected $table = 'gyms';
    protected $fillable = ['name', 'address', 'phone', 'email'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function gymRooms(): HasMany
    {
        return $this->hasMany(GymRoom::class, 'gym_id', 'id');
    }
}
