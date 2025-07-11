<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialization extends Model
{
    protected $table = 'specializations';

    protected $fillable = [
        'specialization',
    ];

    public function trainerProfiles(): HasMany
    {
        return $this->hasMany(TrainerProfile::class, 'specialization_id', 'id');
    }
}
