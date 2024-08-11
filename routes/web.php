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
    return redirect('/projetos');
});

// Grupo de rotas para projetos
Route::controller(ProjetosController::class)->group(function () {
    // Rotas nomeadas, para evitar que alterações futuras na URL demandem atualização em todas as chamadas do projeto
    // Nomes em inglês para utilizar o padrão do Laravel
    Route::get('/projetos', 'index')->name('projetos.index');
    Route::get('/projetos/criar', 'create')->name('projetos.create');
    Route::get('/projetos/editar/{id}', 'edit')->name('projetos.edit')->whereNumber('id');
    Route::post('/projetos/salvar', 'store')->name('projetos.store');
    Route::post('/projetos/remover/{id}', 'destroy')->name('projetos.destroy')->whereNumber('id');
    Route::post('/projetos/atualizar/{id}', 'update')->name('projetos.update')->whereNumber('id');
});

