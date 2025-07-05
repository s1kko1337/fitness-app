<?php

namespace App\DTO;

use App\Models\Gym;
use App\Parents\ObjectData;
use Illuminate\Support\Facades\Hash;

class CreateGymOperatorData extends ObjectData
{
    public string $name;
    public string $surname;
    public string $email;
    public string $password;
    public string $gym_id;


    public static function fromModel(Gym $gym, $password): CreateGymOperatorData
    {
        return new CreateGymOperatorData(
            name: $gym->name,
            surname: 'edit this',
            email: $gym->email,
            password: Hash::make($password),
            gym_id: $gym->id,
        );
    }
}
