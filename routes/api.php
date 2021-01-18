<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::any('ping', RPC\PingController::class);

    Route::middleware('guest')->group(function () {
        Route::post('signup', RPC\SignUpController::class);
    });
    Route::middleware('auth:api')->group(function () {
        Route::get('me', RPC\MeController::class);
        Route::put('me', RPC\UpdateMeController::class);
        Route::patch('me', RPC\UpdateMeController::class);
        Route::apiResource('user', Rest\UserController::class)
            ->only('index', 'show');
    });
});
