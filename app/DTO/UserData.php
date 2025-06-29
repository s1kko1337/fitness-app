<?php

namespace App\DTO;

use App\Http\Requests\StoreGymRequest;
use App\Models\User;
use App\Parents\ObjectData;

class UserData extends ObjectData
{
    public int $id;
    public ?int $gym_id;
    public string $name;
    public string $surname;
    public string $email;
    public ?string $password;


    public static function fromModel(User $user, ?string $password = null): UserData
    {
        return new UserData(
            id:  $user->id,
            gym_id: $user->gym_id,
            name: $user->name,
            surname: $user->surname,
            email: $user->email,
            password: $password,
        );
    }
}
