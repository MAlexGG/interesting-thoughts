<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThoughtController;

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

Auth::routes();

Route::get('/', [ThoughtController::class, 'index'])->name('thoughts');
Route::get('/thoughts/create', [ThoughtController::class, 'create'])->name('create')->middleware('auth');
Route::post('/thoughts/store', [ThoughtController::class, 'store'])->name('store')->middleware('auth');
Route::get('/thoughts/{id}', [ThoughtController::class, 'show'])->name('show');
Route::get('/thoughts/{id}/edit', [ThoughtController::class, 'edit'])->name('edit')->middleware('auth');
Route::put('/thoughts/{id}', [ThoughtController::class, 'update'])->name('update')->middleware('auth');
Route::delete('/thoughts/{id}', [ThoughtController::class, 'destroy'])->name('delete')->middleware('auth');


Route::get('/home', [HomeController::class, 'index'])->name('home');
