<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatoController extends Controller
{
    // GET /api/dati
    public function index()
    {
        return response()->json(
            DB::table('dati')
                ->orderBy('data_rilevazione', 'desc')
                ->get()
        );
    }

    // GET /api/dati/{id}
    public function show($id)
    {
        $dato = DB::table('dati')->where('id', $id)->first();

        if (!$dato) {
            return response()->json(['errore' => 'Dato non trovato'], 404);
        }

        return response()->json($dato);
    }

    // POST /api/dati
    public function store(Request $request)
    {
        $request->validate([
            'temperatura' => 'required|numeric',
            'umidita_aria' => 'required|numeric',
            'suolo' => 'required|integer',
            'acqua' => 'required|integer',
            'rele' => 'required|integer'
        ]);

        DB::table('dati')->insert([
            'temperatura' => $request->temperatura,
            'umidita_aria' => $request->umidita_aria,
            'suolo' => $request->suolo,
            'acqua' => $request->acqua,
            'rele' => $request->rele,
            'data_rilevazione' => now()
        ]);

        return response()->json(['messaggio' => 'Dato inserito correttamente'], 201);
    }

    // DELETE /api/dati/{id}
    public function destroy($id)
    {
        $eliminato = DB::table('dati')->where('id', $id)->delete();

        if (!$eliminato) {
            return response()->json(['errore' => 'Dato non trovato'], 404);
        }

        return response()->json(['messaggio' => 'Dato eliminato']);
    }
}