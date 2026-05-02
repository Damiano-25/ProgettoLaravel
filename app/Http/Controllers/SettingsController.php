<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        $utente = DB::table('utenti')
            ->where('id', session('utente_id'))
            ->first();

        $orto = DB::table('orti')
            ->where('utente_id', session('utente_id'))
            ->first();

        return view('orti.settings', compact('utente', 'orto'));
    }



    public function updateProfile(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'cognome' => 'nullable|string|max:100',
            'email' => 'required|email|max:150',
            'telefono' => 'nullable|string|max:30',
            'bio' => 'nullable|string|max:500',

            // Password opzionale
            'password_attuale' => 'nullable|string',
            'nuova_password' => 'nullable|string|min:8|confirmed',
        ]);

        $utente = DB::table('utenti')
            ->where('id', session('utente_id'))
            ->first();

        $data = [
            'nome' => $request->nome,
            'cognome' => $request->cognome,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'bio' => $request->bio,
            'updated_at' => now(),
        ];

        if ($request->filled('nuova_password')) {
            if (!$request->filled('password_attuale')) {
                return back()->with('error', 'Inserisci la password attuale');
            }

            if (!Hash::check($request->password_attuale, $utente->password)) {
                return back()->with('error', 'Password attuale non corretta');
            }

            $data['password'] = Hash::make($request->nuova_password);
        }

        DB::table('utenti')
            ->where('id', session('utente_id'))
            ->update($data);

        session(['utente_nome' => $request->nome]);

        return redirect()
            ->route('settings')
            ->with('success', 'Profilo aggiornato correttamente');
    }

    public function updateAppearance(Request $request)
    {
        session([
            'tema' => $request->tema,
            'colore' => $request->colore,
        ]);

        return redirect()
            ->route('settings')
            ->with('success', 'Aspetto aggiornato');
    }

    public function updateOrto(Request $request)
    {
        $request->validate([
            'nome_orto' => 'required|string|max:100',
            'provincia' => 'nullable|string|max:50',
        ]);

        DB::table('orti')
            ->where('utente_id', session('utente_id'))
            ->update([
                'nome' => $request->nome_orto,
                'provincia' => $request->provincia,
                'updated_at' => now(),
            ]);

        return redirect()
            ->route('settings')
            ->with('success', 'Orto aggiornato correttamente');
    }
}