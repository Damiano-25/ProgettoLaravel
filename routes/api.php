<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::get('/salva-dati-wifi', function (Request $request) {

    if (
        !$request->has('temperatura') ||
        !$request->has('umidita_aria') ||
        !$request->has('suolo') ||
        !$request->has('acqua') ||
        !$request->has('rele')
    ) {
        return response('parametri mancanti', 400);
    }

    DB::table('dati')->insert([
        'temperatura' => floatval($request->temperatura),
        'umidita_aria' => floatval($request->umidita_aria),
        'suolo' => intval($request->suolo),
        'acqua' => intval($request->acqua),
        'rele' => intval($request->rele),
        'data_rilevazione' => now()
    ]);

    return response('OK', 200);
});