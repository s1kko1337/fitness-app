<?php

namespace App\Actions\Admin;
use App\DTO\CreateGymOperatorData;
use App\Models\Gym;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;

final class CreateGymOperator
{
    use AsAction;

    public static function handle(CreateGymOperatorData $data) : User
    {
        $user = User::create($data->toArray());
        $role = Role::findByName('gym-operator', 'web');
        $user->assignRole($role);

        $user->role_id = $role->id;
        $user->save();

        return $user;
    }
}
