<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorie = DB::table('categorie_piante')->get();

        return view('orti.categoria_pianta', compact('categorie'));
    }

    public function attiva(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required|integer',
        ]);

        DB::table('categorie_piante')->update(['attiva' => 0]);

        DB::table('categorie_piante')
            ->where('id', $request->categoria_id)
            ->update([
                'attiva' => 1,
                'updated_at' => now(),
            ]);

        return redirect()
            ->route('categorie.index')
            ->with('success', 'Categoria attivata correttamente');
    }
}