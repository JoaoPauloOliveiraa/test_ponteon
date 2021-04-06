<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresarioController;
use App\Http\Controllers\CidadeController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::resource('/', EmpresarioController::class);
Route::get('/cidades/{id}', [CidadeController::class, 'cidades']);
Route::get('/{id}', [EmpresarioController::class, 'show']);
Route::post('/excluir/{id}', [EmpresarioController::class, 'destroy'])->name('excluir');