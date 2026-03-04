<?php

namespace App\Http\Controllers;

use App\Models\Articolo;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class ArticoloController extends Controller
{
    public function index()
    {
        $articoli = Articolo::all();
        return view('articoli.index', compact('articoli'));
    }

    //creo metodo per mostrare form per inserire nuovo articolo
    public function create()
    {
        return view('articoli.create');
    }

    //creo metodo che salva articolo nel db
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:30',
            'descrizione' => 'nullable|string|max:100',
        ]);

        Articolo::create($data);

        return redirect()->route('articoli.index');
    }

    //mostra form di modifica di un articolo
    public function edit(Articolo $articoli)
    {
        return view('articoli.edit', compact('articoli'));
    }

    //request --> contiene dati inviarti dal client
    //articolo --> articolo selezionato
    public function update(Request $request, Articolo $articoli)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:30',
            'descrizione' => 'nullable|string|max:100',
        ]);

        $articoli->update($data);

        return redirect()->route('articoli.index');
    }

    //creo metodo per rimuovere articolo
    public function destroy(Articolo $articoli)
    {
        $articoli->delete();
        return redirect()->route('articoli.index');
    }
}
