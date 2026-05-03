<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatiApiController extends Controller
{
    public function store(Request $request)
    {
        if (
            !$request->has('temperatura') ||
            !$request->has('umidita_aria') ||
            !$request->has('suolo') ||
            !$request->has('acqua') ||
            !$request->has('rele')
        ) {
            return response()->json([
                'errore' => 'Parametri mancanti'
            ], 400);
        }

        $piantaId = $request->query('pianta_id');

        if (!$piantaId) {
            $piantaAttiva = DB::table('piante')
                ->where('attiva', 1)
                ->first();

            $piantaId = $piantaAttiva->id ?? null;
        }

        if (!$piantaId) {
            return response()->json([
                'errore' => 'Nessuna pianta attiva'
            ], 400);
        }

        DB::table('dati')->insert([
            'pianta_id' => $piantaId,
            'temperatura' => $request->temperatura,
            'umidita_aria' => $request->umidita_aria,
            'suolo' => $request->suolo,
            'acqua' => $request->acqua,
            'rele' => $request->rele,
            'data_rilevazione' => now(),
        ]);

        return response()->json([
            'messaggio' => 'Dati salvati correttamente',
            'pianta_id' => $piantaId
        ], 200);
    }
}