<?php

use App\Http\Controllers\ArticoloController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdineController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('articoli', ArticoloController::class);
Route::resource('clienti', ClienteController::class);
Route::resource('ordini', OrdineController::class);