<?php

namespace App\Actions\Admin;
use App\DTO\GymOperatorCreateData;
use App\Models\Gym;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;

final class CreateGymOperator
{
    use AsAction;

    public static function handle(GymOperatorCreateData $data) : User
    {
        $user = User::create($data->toArray());
        $user->assignRole('gym-operator');

        return $user;
    }
}
