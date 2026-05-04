<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DatiApiController;
use App\Http\Controllers\Api\ConfigurazionePiantaController;
use App\Http\Controllers\Api\MeteoController;

//API interna: Arduino invia i dati dei sensori a Laravel
Route::get('/salva-dati-wifi', [DatiApiController::class, 'store']);

//API interna: Arduino legge la configurazione della pianta attiva
Route::get('/configurazione-pianta', [ConfigurazionePiantaController::class, 'show']);

//API esterna: Laravel interroga OpenWeather
Route::get('/meteo-esterno', [MeteoController::class, 'show']);









