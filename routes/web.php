<?php

use App\Http\Controllers\ThoughtController;
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


Route::get('/', [ThoughtController::class, 'index'])->name('home');
Route::get('/thoughts/create', [ThoughtController::class, 'create'])->name('create');
Route::post('/thoughts/store', [ThoughtController::class, 'store'])->name('store');
Route::get('/thoughts/{id}', [ThoughtController::class, 'show'])->name('show');
Route::get('/thoughts/{id}/edit', [ThoughtController::class, 'edit'])->name('edit');
