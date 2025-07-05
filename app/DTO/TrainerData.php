<?php

namespace App\DTO;

use App\Http\Requests\StoreGymRequest;
use App\Models\User;
use App\Parents\ObjectData;

class TrainerData extends ObjectData
{
    public int $id;
    public int $gym_id;
    public string $name;
    public string $surname;
    public string $email;
    public string $role_id;


    public static function fromModel(User $user): TrainerData
    {
        return new TrainerData(
            id:  $user->id,
            gym_id: $user->gym_id,
            name: $user->name,
            surname: $user->surname,
            email: $user->email,
            role_id: $user->role_id
        );
    }
}
