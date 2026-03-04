<?php

use App\Http\Controllers\ArticoloController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('articoli', ArticoloController::class);