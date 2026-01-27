<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\AuthController;

Route::prefix('auth')->controller(AuthController::class)->group(function() {
    Route::post('/register', 'register');
});
