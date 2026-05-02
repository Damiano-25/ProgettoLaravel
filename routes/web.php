<?php

use App\Http\Controllers\ArticoloController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdineController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrtoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Utente;
use App\Http\Controllers\SettingsController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('orti', OrtoController::class);
Route::resource('articoli', ArticoloController::class);
Route::resource('clienti', ClienteController::class);
Route::resource('ordini', OrdineController::class);
Route::get('/index/{id}', [OrtoController::class, 'index'])->name('index');

Route::get('/users', [OrtoController::class, 'users'])->name('users');
//Route::get('/index', function () {
// return view('orti.index');
//})->name('index');

Route::post('/settings/orto', [SettingsController::class, 'updateOrto'])
    ->name('settings.orto.update');

Route::get('/analytics', function () {
    return view('orti.analytics');
})->name('analytics');

Route::post('/settings/orto', [SettingsController::class, 'updateOrto'])
    ->name('settings.orto.update');

Route::get('/terms', function () {
    return view('orti.terms');
})->name('terms');

//Route::get('/users', function () {
//  return view('orti.users');
//})->name('users');

Route::get('/settings', function () {
    return view('orti.settings');
})->name('settings');

Route::get('/login', function () {
    return view('orti.login');
})->name('login');

Route::get('/register', function () {
    return view('orti.register');
})->name('register');

Route::get('/meteo', function () {
    return view('orti.meteo');
})->name('meteo');

//legge categorie piante dal db e le manda a index.blade
Route::get('/categorie-piante', function () {
    $categorie = DB::table('categorie_piante')->get();
    return view('orti.categoria_pianta', compact('categorie'));
});

//disattiva tutte categorie e attiva quella scelta
Route::post('/categorie-piante/attiva', function (Request $request) {
    DB::table('categorie_piante')->update(['attiva' => 0]);

    DB::table('categorie_piante')
        ->where('id', $request->categoria_id)
        ->update(['attiva' => 1]);

    return redirect('/categorie-piante');
});

//route login
Route::post('/login', function (Request $request) {
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

    return redirect()->route('users');
})->name('login.post');


//route registrazione
Route::post('/register', function (Request $request) {

    $dati = $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:utenti,email',
        'password' => 'required|min:6|confirmed'
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

    return redirect()->route('login');

})->name('register.post');



//route settings
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::post('/settings/profile', [SettingsController::class, 'updateProfile'])
    ->name('settings.profile.update');

Route::post('/settings/password', [SettingsController::class, 'updatePassword'])
    ->name('settings.password.update');

Route::post('/settings/appearance', [SettingsController::class, 'updateAppearance'])
    ->name('settings.appearance.update');








//attiva programma irrigazione per pianta selezionata
Route::post('/piante/{id}/attiva', function ($id) {

    // disattiva tutte le piante
    DB::table('piante')->update(['attiva' => 0]);

    // attiva solo la pianta selezionata
    DB::table('piante')
        ->where('id', $id)
        ->update(['attiva' => 1]);

    return redirect()
        ->route('index', ['id' => $id])
        ->with('success', 'Programma di irrigazione attivato per questa pianta');

})->name('piante.attiva');

//disattiva programma irrigazione per pianta selezionata
Route::post('/piante/{id}/disattiva', function ($id) {

    DB::table('piante')
        ->where('id', $id)
        ->update(['attiva' => 0]);

    return back()->with('success', 'Programma di irrigazione disattivato');

})->name('piante.disattiva');



Route::get('/piante/create', function () {

    $orti = DB::table('orti')
        ->where('utente_id', session('utente_id'))
        ->get();

    $categorie = DB::table('categorie_piante')->get();

    return view('orti.create_pianta', compact('orti', 'categorie'));

})->name('piante.create');

Route::post('/piante', function (Request $request) {
    $data = $request->validate([
        'nome' => 'required|string|max:100',
        'orto_id' => 'required|integer',
        'categoria_id' => 'required|integer',
    ]);

    DB::table('piante')->insert([
        'nome' => $data['nome'],
        'orto_id' => $data['orto_id'],
        'categoria_id' => $data['categoria_id'],
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('users')->with('success', 'Pianta aggiunta correttamente');
})->name('piante.store');

Route::delete('/piante/{id}', function ($id) {
    DB::table('piante')->where('id', $id)->delete();

    return redirect()->route('users')->with('success', 'Pianta rimossa correttamente');
})->name('piante.destroy');