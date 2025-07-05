<?php

namespace App\Actions\Auth;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

final class Logout
{
    use AsAction;

    public static function handle(User $user): void
    {
        $user->currentAccessToken()->delete();
    }
}
