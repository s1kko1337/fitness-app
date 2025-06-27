<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public static $wrap = null;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'gym_id' => $this->gym_id,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'telegram_username' => $this->telegram_username,
            'role' => $this['roles'][0]['name'],
            'token' => $this['token'],
        ];
    }
}
