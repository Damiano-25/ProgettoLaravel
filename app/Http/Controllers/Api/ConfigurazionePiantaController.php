<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ConfigurazionePiantaController extends Controller
{
    public function show()
    {
        //trova la pianta attiva
        $pianta = DB::table('piante')
            ->where('attiva', 1)
            ->first(); //prende solo primo risultato da query

        if (!$pianta) {
            return response()->json([]);
        }

        //recupera categoria
        $categoria = DB::table('categorie_piante')
            ->where('id', $pianta->categoria_id)
            ->first();

        if (!$categoria) {
            return response()->json([
                'errore' => 'Categoria non trovata'
            ], 404);
        }

        //configurazione per Arduino
        return response()->json([
            'pianta_id' => $pianta->id,
            'soglia_suolo' => $categoria->soglia_suolo,
            'durata_irrigazione' => $categoria->durata_irrigazione,
            'intervallo_irrigazione' => $categoria->intervallo_irrigazione
        ]);
    }
}