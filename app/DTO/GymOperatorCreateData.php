<?php

namespace App\DTO;

use App\Models\Gym;
use App\Parents\ObjectData;
use Illuminate\Support\Facades\Hash;

class GymOperatorCreateData extends ObjectData
{
    public string $name;
    public string $surname;
    public string $email;
    public string $password;
    public string $gym_id;


    public static function fromModel(Gym $gym, $password): GymOperatorCreateData
    {
        return new GymOperatorCreateData(
            name: $gym->name,
            surname: 'edit this',
            email: $gym->email,
            password: Hash::make($password),
            gym_id: $gym->id,
        );
    }
}
