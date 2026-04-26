<?php

namespace App\Http\Controllers;

use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clienti = Cliente::orderBy('cognome')->get();
        return view('clienti.index', compact('clienti'));
    }

    public function show(Cliente $cliente)
    {
        $cliente->load('ordini');
        return view('clienti.show', compact('cliente'));
    }
}