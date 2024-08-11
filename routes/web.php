<?php

use App\Http\Controllers\ProjetosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projetos', [ProjetosController::class, 'index']);
Route::get('/projetos/criar', [ProjetosController::class, 'create']);
Route::post('/projetos/salvar', [ProjetosController::class, 'store']);
