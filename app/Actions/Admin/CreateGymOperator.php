<?php

namespace App\Actions\Admin;
use App\Models\Gym;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;

final class CreateGymOperator
{
    use AsAction;

    public static function handle(Gym $gym, $password) : User
    {
        $user = User::create([
            'name' => $gym->name,
            'surname' => 'test',
            'email' => $gym->email,
            'password' => Hash::make($password),
            'gym_id' => $gym->id,
        ]);
        $user->assignRole('gym-operator');

        return $user;
    }
}
