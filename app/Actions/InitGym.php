<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;
use Symfony\Component\HttpFoundation\Response;

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
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        MailToGymOwner::run($user, $password);
    }
}
