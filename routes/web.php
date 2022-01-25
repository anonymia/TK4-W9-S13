<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NilaiController;

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

Route::get('/', [NilaiController::class, 'index'])->name('nilai');
Route::view('/create', 'input');
Route::post('/create', [NilaiController::class, 'create']);
Route::get('/{id}', [NilaiController::class, 'get']);
Route::put('/{id}', [NilaiController::class, 'put']);
Route::delete('/{id}', [NilaiController::class, 'delete']);
