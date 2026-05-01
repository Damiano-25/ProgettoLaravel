<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatiService
{
    public function salvaDati(Request $request)
    {
        $dato = [
            'temperatura' => floatval($request->temperatura),
            'umidita_aria' => floatval($request->umidita_aria),
            'suolo' => intval($request->suolo),
            'acqua' => intval($request->acqua),
            'rele' => intval($request->rele),
            'data_rilevazione' => now()
        ];

        DB::table('dati')->insert($dato);

        return $dato;
    }
}