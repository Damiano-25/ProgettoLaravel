<?php

namespace App\Http\Controllers;

use App\Models\Orto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrtoController extends Controller
{
    public function index($id = null)
    {
        $orti = Orto::where('utente_id', session('utente_id'))->get();

        $pianta = null;
        $dati = null;

        if ($id) {
            $pianta = DB::table('piante')
                ->join('orti', 'piante.orto_id', '=', 'orti.id')
                ->join('categorie_piante', 'piante.categoria_id', '=', 'categorie_piante.id')
                ->where('piante.id', $id)
                ->where('orti.utente_id', session('utente_id'))
                ->select(
                    'piante.id',
                    'piante.nome as nome_pianta',
                    'piante.attiva',
                    'categorie_piante.nome as categoria'
                )
                ->first();

            if ($pianta) {
                $dati = DB::table('dati')
                    ->where('pianta_id', $id)
                    ->orderByDesc('id')
                    ->first();
            }
        }

        $nomePianta = $pianta->nome_pianta ?? null;

        return view('orti.dati_pianta', compact('orti', 'dati', 'nomePianta', 'pianta'));
    }

    public function users()
    {
        $sub = DB::table('dati')
            ->selectRaw('MAX(id) as id')
            ->groupBy('pianta_id');

        $dati2 = DB::table('piante')
            ->join('orti', 'piante.orto_id', '=', 'orti.id')
            ->join('categorie_piante', 'piante.categoria_id', '=', 'categorie_piante.id')
            ->leftJoin('dati', function ($join) use ($sub) {
                $join->on('piante.id', '=', 'dati.pianta_id')
                    ->whereIn('dati.id', $sub);
            })
            ->where('orti.utente_id', session('utente_id'))
            ->select(
                'piante.id as ID_PIANTA',
                'piante.nome as NOME_PIANTA',
                'orti.provincia as PROVINCIA_ORTO',
                DB::raw('COALESCE(dati.data_rilevazione, piante.created_at) as DATA_RECORD'),
                'dati.suolo as UMIDITA_RADICI_PERC'
            )
            ->get();

        $dati = DB::table('dati')
            ->join('piante', 'dati.pianta_id', '=', 'piante.id')
            ->join('orti', 'piante.orto_id', '=', 'orti.id')
            ->where('orti.utente_id', session('utente_id'))
            ->orderByDesc('dati.id')
            ->select('dati.*')
            ->first();

        $nomePianta = $dati2->first()->NOME_PIANTA ?? 'Nessuna pianta';

        $nPiante = DB::table('piante')
            ->join('orti', 'piante.orto_id', '=', 'orti.id')
            ->where('orti.utente_id', session('utente_id'))
            ->count();

        return view('orti.dati_orto', compact('dati', 'nomePianta', 'nPiante', 'dati2'));
    }

    public function create()
    {
        return view('orti.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:30',
            'descrizione' => 'nullable|string|max:100',
        ]);

        Orto::create($data);

        return redirect()->route('orti.index');
    }

    public function edit(Orto $orti)
    {
        return view('orti.edit', compact('orti'));
    }

    public function update(Request $request, Orto $orti)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:30',
            'descrizione' => 'nullable|string|max:100',
        ]);

        $orti->update($data);

        return redirect()->route('orti.index');
    }

    public function destroy(Orto $orti)
    {
        $orti->delete();

        return redirect()->route('orti.index');
    }
}