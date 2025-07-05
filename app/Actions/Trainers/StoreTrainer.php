<?php

namespace App\Actions\Trainers;
use App\DTO\CreateTrainerData;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;

final class StoreTrainer
{
    use AsAction;

    public static function handle(CreateTrainerData $data) : User
    {

        $user = User::create($data->toArray());
        $role = Role::findByName('trainer', 'web');
        $user->assignRole($role);
        $user->role_id=$role->id;
        $user->save();
        return $user;
    }
}
