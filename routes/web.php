<?php

use App\Http\Controllers\ArticoloController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdineController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrtoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('orti', OrtoController::class);
Route::resource('articoli', ArticoloController::class);
Route::resource('clienti', ClienteController::class);
Route::resource('ordini', OrdineController::class);
//Route::get('/dashboard', [OrtoController::class, 'index']);

Route::get('/index', function () {
    return view('orti.index');
})->name('index');

Route::get('/analytics', function () {
    return view('orti.analytics');
})->name('analytics');

Route::get('/users', function () {
    return view('orti.users');
})->name('users');

Route::get('/settings', function () {
    return view('orti.settings');
})->name('settings');

Route::get('/login', function () {
    return view('orti.login');
})->name('login');

Route::get('/register', function () {
    return view('orti.register');
})->name('register');