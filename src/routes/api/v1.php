<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\PilotController;
use App\Http\Controllers\V1\TrackController;
use App\Http\Controllers\V1\RaceController;

Route::prefix('auth')->controller(AuthController::class)->group(function() {
    Route::post('/register', 'register');
});

Route::middleware('auth.basic')->group(function () {
    Route::resource('pilots', PilotController::class);
    Route::resource('tracks', TrackController::class);

    Route::patch('races/{race}/start', [RaceController::class, 'startRace']);
    Route::patch('races/{race}/pilots', [RaceController::class, 'updateRacePilots']);
    Route::resource('races', RaceController::class);
});
