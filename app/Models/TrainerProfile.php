<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainerProfile extends Model
{
    protected $table = 'trainer_profiles';

    protected $fillable = [
        'user_id',
        'qualification',
        'specialization_id',
        'hourly_rate',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function specialization(): BelongsTo
    {
        return $this->belongsTo(Specialization::class, 'specialization_id','id');
    }
}
