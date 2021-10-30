<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['App\Http\Controllers\GameController', 'index'])->name('game.index');
Route::post('/store-game', ['App\Http\Controllers\GameController', 'store'])->name('game.store');
Route::get('/game-history', ['App\Http\Controllers\GameController', 'history'])->name('game.history');
