<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ActivityType extends Model
{
    protected $table = 'activity_types';

    protected $fillable = [
        'type'
    ];

    public function activity() : HasMany
    {
        return $this->hasMany(Activity::class, 'activity_type_id', 'id');
    }
}
