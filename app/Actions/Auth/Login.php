<?php

namespace App\Actions\Auth;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

final class Login
{
    use AsAction;

    public static function handle(User $user)
    {
        $permissions = $user->getAllPermissions()->pluck('name')->toArray();
        $user->tokens()->delete();
        $user['token'] = $user->createToken("Token of user: {$user->name}",$permissions)->plainTextToken;
    }
}
