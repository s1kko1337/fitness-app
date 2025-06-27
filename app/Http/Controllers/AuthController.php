<?php

namespace App\Http\Controllers;

use App\Actions\Auth\Login;
use App\Actions\Auth\Logout;
use App\Http\Requests\LoginUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthController extends Controller
{
    public function login(LoginUserRequest $request): JsonResponse
    {
        $user = Auth::attempt($request->validated()) && ($user = Auth::user()) ? $user : null;
        Login::run($user);
        return $this->userLogined(UserResource::make($user));
    }

    public function logout(): JsonResponse
    {
        $user = Auth::user();
        Logout::run($user);
        return $this->userLogout(UserResource::make($user));
    }
}
