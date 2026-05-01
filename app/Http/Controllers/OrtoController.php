<?php

namespace App\Http\Controllers;

use App\Models\Orto;
use App\Models\RecordPiante;
use Illuminate\Http\Request;
use App\Services\ArticoloService;
use function PHPUnit\Framework\returnArgument;

class OrtoController extends Controller
{
    protected $articoloService;
    public function __construct(ArticoloService $articoloService)
    {
        $this->articoloService = $articoloService;
    }

    public function index()
    {
        $orti = Orto::all();
        $dati = RecordPiante::where('id', 1)->first();
        return view('orti.index', compact('orti', 'dati'));
    }
    public function show(Orto $orto)
    {
        $orto = Orto::all();
        return view('orti.show', compact('orto'));
    }

    //creo metodo per mostrare form per inserire nuovo sito
    public function create()
    {
        return view('orti.create');
    }

    //creo metodo che salva sito nel db
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:30',
            'descrizione' => 'nullable|string|max:100',
        ]);

        Orto::create($data);

        return redirect()->route('orti.index');
    }

    //mostra form di modifica di un sito
    public function edit(Orto $orti)
    {
        return view('orti.edit', compact('orti'));
    }

    //request --> contiene dati inviarti dal client
    //sito --> sito selezionato
    public function update(Request $request, Orto $orti)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:30',
            'descrizione' => 'nullable|string|max:100',
        ]);

        $orti->update($data);

        return redirect()->route('orti.index');
    }

    //creo metodo per rimuovere sito
    public function destroy(Orto $orti)
    {
        $orti->delete();
        return redirect()->route('orti.index');
    }
}
