<?php

namespace App\Actions\Admin;

use App\DTO\GymCreateData;
use App\DTO\CreateGymOperatorData;
use App\DTO\UserData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;

final class InitGym
{
    use AsAction;

    public static function handle(GymCreateData $data)
    {
        $password = Str::random(12);
        DB::beginTransaction();
        $gym = CreateGym::run($data);
        $user = CreateGymOperator::run(CreateGymOperatorData::fromModel($gym, $password));
        $gym->owner_id = $user->id;
        $gym->save();
        DB::commit();
        MailToGymOwner::run(UserData::fromModel($user,$password));

        return $gym;
    }
}
