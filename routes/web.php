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

Route::get('/analytics', function () {
    return view('orti.analytics');
})->name('analytics');

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

    return redirect()->route('index', ['id' => 1]);
})->name('login.post');

//route registrazione
Route::post('/register', function (Request $request) {
    $dati = $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:utenti,email',
        'password' => 'required|min:6|confirmed', //confirmed
    ]);

    Utente::create([
        'nome' => $dati['nome'],
        'email' => $dati['email'],
        'password' => Hash::make($dati['password']), //password hashata
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