<?php

namespace App\Actions\Auth;

use Lorisleiva\Actions\Concerns\AsAction;

final class Logout
{
    use AsAction;

    public static function handle($user): void
    {
        $user->currentAccessToken()->delete();
    }
}
