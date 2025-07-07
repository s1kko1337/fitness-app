<?php

namespace App\Http\Controllers;

use App\Actions\Auth\Logout;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        Logout::run($user);
        return $this->userLogout(UserResource::make($user));
    }
}
