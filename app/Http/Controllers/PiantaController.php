<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PiantaController extends Controller
{
    public function create()
    {
        $utenteId = session('utente_id');

        if (!$utenteId) {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'Devi effettuare il login prima di aggiungere una pianta.']);
        }

        $orto = DB::table('orti')
            ->where('utente_id', $utenteId)
            ->first();

        if (!$orto) {
            DB::table('orti')->insert([
                'nome' => 'Orto principale',
                'provincia' => 'Non specificata',
                'utente_id' => $utenteId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $orti = DB::table('orti')
            ->where('utente_id', $utenteId)
            ->get();

        $categorie = DB::table('categorie_piante')->get();

        return view('orti.create_pianta', compact('orti', 'categorie'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:100',
            'orto_id' => 'required|integer',
            'categoria_id' => 'required|integer',
        ]);

        DB::table('piante')->insert([
            'nome' => $data['nome'],
            'orto_id' => $data['orto_id'],
            'categoria_id' => $data['categoria_id'],
            'attiva' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('dati_orto')
            ->with('success', 'Pianta aggiunta correttamente');
    }

    public function destroy($id)
    {
        DB::table('piante')
            ->where('id', $id)
            ->delete();

        return redirect()
            ->route('dati_orto')
            ->with('success', 'Pianta rimossa correttamente');
    }

    public function attiva($id)
    {
        DB::table('piante')->update(['attiva' => 0]);

        DB::table('piante')
            ->where('id', $id)
            ->update([
                'attiva' => 1,
                'updated_at' => now(),
            ]);

        return redirect()
            ->route('dati_pianta', ['id' => $id])
            ->with('success', 'Programma di irrigazione attivato per questa pianta');
    }

    public function disattiva($id)
    {
        DB::table('piante')
            ->where('id', $id)
            ->update([
                'attiva' => 0,
                'updated_at' => now(),
            ]);

        return back()->with('success', 'Programma di irrigazione disattivato');
    }
}