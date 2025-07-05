<?php

namespace App\Actions\Trainers;
use App\DTO\CreateTrainerData;
use App\DTO\TrainerData;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;

final class DeleteTrainer
{
    use AsAction;

    public static function handle($id) : void
    {
        $user = User::query()->where('users.role_id','2')->findOrFail($id);
        $user->roles()->detach();
        $user->delete();
    }
}
