<?php

namespace App\Http\Controllers;

use App\Models\Ordine;

class OrdineController extends Controller
{
    public function index()
    {
        $ordini = Ordine::with('cliente')->orderByDesc('data_ordine')->get();
        return view('ordini.index', compact('ordini'));
    }

    public function show(Ordine $ordine)
    {
        $ordine->load(['cliente', 'articoli']);
        return view('ordini.show', compact('ordine'));
    }
}