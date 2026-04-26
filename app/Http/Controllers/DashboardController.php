<?php

namespace App\Http\Controllers;

use App\Models\Articolo;

class DashboardController extends Controller
{
    public function index()
    {
        $sito = Sito::all();

        return view('sito.dashboard', compact('sito'));
    }
}