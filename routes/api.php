<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DatiApiController;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


//route api rest interna dati arduino
Route::get('/salva-dati-wifi', [DatiApiController::class, 'store']);

//route api rest esterna meteo
//coordinate usare:
Route::get('/meteo-esterno', function (Request $request) {

    $citta = $request->query('citta');

    if (!$citta) {
        return response()->json([
            'errore' => 'città mancante'
        ], 400);
    }

    $meteo = Http::get('https://api.openweathermap.org/data/2.5/weather', [
        'q' => $citta . ',IT',
        'appid' => env('OPENWEATHER_API_KEY'),
        'units' => 'metric',
        'lang' => 'it'
    ]);

    return $meteo->json();
});