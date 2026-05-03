<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MeteoController extends Controller
{
    public function show(Request $request)
    {
        $citta = $request->query('citta');

        if (!$citta) {
            return response()->json([
                'errore' => 'città mancante'
            ], 400);
        }

        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'q' => $citta . ',IT',
            'appid' => env('OPENWEATHER_API_KEY'),
            'units' => 'metric',
            'lang' => 'it',
        ]);

        return response()->json($response->json(), $response->status());
    }
}