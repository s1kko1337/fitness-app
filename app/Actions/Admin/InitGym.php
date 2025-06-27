<?php

namespace App\Actions\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;

final class InitGym
{
    use AsAction;

    public static function handle($request)
    {
        $password = Str::random(12);

        DB::beginTransaction();
        try {
            $gym = CreateGym::run($request);
            $user = CreateGymOperator::run($gym, $password);
            $gym->owner_id = $user->id;
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        MailToGymOwner::run($user, $password);

        return $gym;
    }
}
