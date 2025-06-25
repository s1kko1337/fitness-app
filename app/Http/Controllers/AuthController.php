<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
class AuthController extends Controller
{

    public function login(LoginUserRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->toArray())) {
            return response()->json([
                'errors' => 'Wrong email or password',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();
        $permissions = $user->getAllPermissions()->pluck('name')->toArray();
        $user->tokens()->delete();
        return response()->json([
            'user' => $user,
            'token' => $user->createToken("Token of user: {$user->name}",$permissions)->plainTextToken,
        ],Response::HTTP_OK,);
    }

    public function logout(): JsonResponse
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logged out, token removed',
        ],Response::HTTP_OK);
    }
}
