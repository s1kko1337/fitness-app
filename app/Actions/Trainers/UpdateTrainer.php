<?php

namespace App\Actions\Trainers;
use App\DTO\CreateTrainerData;
use App\DTO\TrainerData;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;

final class UpdateTrainer
{
    use AsAction;

    public static function handle($id,$request) : string
    {
        $user = User::query()->where('users.role_id','2')->findOrFail($id);
        $user->update($request->all());
        $user->save();
        return $user->id;
    }
}
