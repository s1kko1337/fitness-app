<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainerProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'qualification' => $this->qualification,
            'specialization' => $this->specialization,
            'hourly_rate' => $this->hourly_rate
        ];
    }
}
