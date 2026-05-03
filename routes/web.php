<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrtoController;
use App\Http\Controllers\PiantaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ArticoloController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OrdineController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| ORTO
|--------------------------------------------------------------------------
*/
Route::get('/dati-orto', [OrtoController::class, 'users'])->name('dati_orto');
Route::get('/dati-pianta/{id?}', [OrtoController::class, 'index'])->name('dati_pianta'); //? rende opzionale id

/*
|--------------------------------------------------------------------------
| PIANTE
|--------------------------------------------------------------------------
*/

Route::get('/piante/create', [PiantaController::class, 'create'])->name('piante.create');
Route::post('/piante', [PiantaController::class, 'store'])->name('piante.store');
Route::delete('/piante/{id}', [PiantaController::class, 'destroy'])->name('piante.destroy');

Route::post('/piante/{id}/attiva', [PiantaController::class, 'attiva'])->name('piante.attiva');
Route::post('/piante/{id}/disattiva', [PiantaController::class, 'disattiva'])->name('piante.disattiva');

/*
|--------------------------------------------------------------------------
| CATEGORIE PIANTE
|--------------------------------------------------------------------------
*/

Route::get('/categorie-piante', [CategoriaController::class, 'index'])->name('categorie.index');
Route::post('/categorie-piante/attiva', [CategoriaController::class, 'attiva'])->name('categorie.attiva');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

/*
|--------------------------------------------------------------------------
| SETTINGS
|--------------------------------------------------------------------------
*/

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::post('/settings/profile', [SettingsController::class, 'updateProfile'])->name('settings.profile.update');
Route::post('/settings/password', [SettingsController::class, 'updatePassword'])->name('settings.password.update');
Route::post('/settings/appearance', [SettingsController::class, 'updateAppearance'])->name('settings.appearance.update');
Route::post('/settings/orto', [SettingsController::class, 'updateOrto'])->name('settings.orto.update');

/*
|--------------------------------------------------------------------------
| PAGINE STATICHE
|--------------------------------------------------------------------------
*/

Route::get('/istruzioni', function () {
    return view('orti.istruzioni');
})->name('istruzioni');

Route::get('/terms', function () {
    return view('orti.terms');
})->name('terms');

Route::get('/meteo', function () {
    return view('orti.meteo');
})->name('meteo');

/*
|--------------------------------------------------------------------------
| ALTRO
|--------------------------------------------------------------------------
*/
Route::resource('articoli', ArticoloController::class);
Route::resource('clienti', ClienteController::class);
Route::resource('ordini', OrdineController::class);