<?php

namespace App\Actions\Trainers;
use App\DTO\CreateTrainerData;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;

final class ShowTrainer
{
    use AsAction;

    public static function handle(string $id) : User
    {
        return User::query()->where('users.role_id','2')->findOrFail($id);
    }
}
