<?php

use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::post('login',\App\Http\Controllers\LoginController::class);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('logout',\App\Http\Controllers\LogoutController::class);

        Route::middleware('role:admin')->group(function () {
            Route::post('createGym',\App\Http\Controllers\CreateGymController::class);
        });

        Route::middleware('role:admin|gym-operator')->group(function () {
            Route::apiResource('trainers',\App\Http\Controllers\TrainerController::class);
        });
    });

});
