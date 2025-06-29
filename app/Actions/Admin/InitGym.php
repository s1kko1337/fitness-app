<?php

namespace App\Actions\Admin;

use App\DTO\GymCreateData;
use App\DTO\GymOperatorCreateData;
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
        try {
            $gym = CreateGym::run($data);
            $user = CreateGymOperator::run(GymOperatorCreateData::fromModel($gym, $password));
            $gym->owner_id = $user->id;
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        MailToGymOwner::run(UserData::fromModel($user,$password));

        return $gym;
    }
}
