<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\PilotController;

Route::prefix('auth')->controller(AuthController::class)->group(function() {
    Route::post('/register', 'register');
});

Route::middleware('auth.basic')->group(function () {
    Route::resource('pilots', PilotController::class);
});
