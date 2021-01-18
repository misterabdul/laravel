<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Route;

Route::any('/', HomeController::class)
    ->name('Home');

Route::fallback(function () {
    return abort('404');
});
