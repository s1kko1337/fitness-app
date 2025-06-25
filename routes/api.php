<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;


Route::prefix('v1')->group(function () {
    Route::post('login',[AuthController::class, 'login']);

    Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
        Route::get('test', function(){
            return response()->json([
                'message' => 'test'
            ], Response::HTTP_OK);
        });
        Route::get('logout',[AuthController::class, 'logout']);
    });
});
