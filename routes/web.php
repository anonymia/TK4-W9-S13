<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;

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

Route::get('/', [VideoController::class, 'index'])->name('video');
Route::view('/create', 'create');
Route::post('/create', [VideoController::class, 'create']);
Route::delete('/{id}', [VideoController::class, 'delete']);
