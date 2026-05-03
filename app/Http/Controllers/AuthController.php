<?php

namespace App\Http\Controllers;

use App\Models\Utente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('orti.login');
    }

    public function login(Request $request)
    {
        $dati = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $utente = Utente::where('email', $dati['email'])->first();

        if (!$utente || !Hash::check($dati['password'], $utente->password)) {
            return back()->withErrors([
                'email' => 'Email o password non corretti.',
            ]);
        }

        session([
            'utente_id' => $utente->id,
            'utente_nome' => $utente->nome,
        ]);

        return redirect()->route('dati_orto');
    }

    public function showRegister()
    {
        return view('orti.register');
    }

    public function register(Request $request)
    {
        $dati = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:utenti,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $utente = Utente::create([
            'nome' => $dati['nome'],
            'email' => $dati['email'],
            'password' => Hash::make($dati['password']),
        ]);

        DB::table('orti')->insert([
            'nome' => 'Orto principale',
            'provincia' => 'Non specificata',
            'utente_id' => $utente->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Registrazione completata. Ora puoi accedere.');
    }
}