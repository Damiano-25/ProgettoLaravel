<?php

namespace App\Http\Controllers;

use App\Models\Articolo;

class DashboardController extends Controller
{
    public function index()
    {
        $articoli = Articolo::all();

        return view('articoli.dashboard', compact('articoli'));
    }
}