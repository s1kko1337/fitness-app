<?php

namespace App\Http\Controllers;

use App\Actions\Auth\Login;
use App\Http\Requests\LoginUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginUserRequest $request) : \Illuminate\Http\JsonResponse
    {
        $user = Auth::attempt($request->validated()) && ($user = Auth::user()) ? $user : null;
        Login::run($user);
        return $this->userLogined(UserResource::make($user));
    }
}
