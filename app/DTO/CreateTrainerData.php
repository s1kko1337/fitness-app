<?php


namespace App\DTO;

use App\Http\Requests\StoreGymRequest;
use App\Http\Requests\StoreTrainerRequest;
use App\Models\User;
use App\Parents\ObjectData;
use Illuminate\Support\Facades\Auth;

class CreateTrainerData extends ObjectData
{
    public ?int $id;
    public string $name;
    public  string $gym_id;
    public string $surname;
    public string $email;
    public ?string $password;

    public static function fromRequest(StoreTrainerRequest $request, ?string $password = null) : CreateTrainerData
    {
        return new CreateTrainerData(
            name: $request->get('name'),
            surname: $request->get('surname'),
            gym_id: $request->get('gym_id'),
            email: $request->get('email'),
            password: $password,
        );
    }
    public static function fromModel(User $user, ?string $password = null): CreateTrainerData
    {
        return new CreateTrainerData(
            id: $user->id,
            gym_id: $user->gym_id,
            name: $user->name,
            surname: $user->surname,
            email: $user->email,
            password: $password,
        );
    }
}
