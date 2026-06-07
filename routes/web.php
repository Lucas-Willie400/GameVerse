<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JogoController;
use App\Http\Controllers\DesenvolvedorController;
use App\Http\Controllers\TorneioController;

Route::get('/', [AuthController::class, 'loginForm']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::resource('jogos', JogoController::class);

    Route::resource('desenvolvedores', DesenvolvedorController::class);

    Route::resource('torneios', TorneioController::class);

    Route::post('/logout', [AuthController::class, 'logout']);

});