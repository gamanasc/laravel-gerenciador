<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjetosController;
use App\Http\Controllers\TasksController;
use App\Http\Middleware\Autenticador;
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
})->middleware(Autenticador::class);

// Grupo de rotas para projetos
Route::controller(ProjetosController::class)->group(function () {
    // Rotas nomeadas, para evitar que alterações futuras na URL demandem atualização em todas as chamadas do projeto
    // Nomes em inglês para utilizar o padrão do Laravel
    Route::get('/projetos', 'index')->name('projetos.index');
    Route::get('/projetos/criar', 'create')->name('projetos.create');
    Route::get('/projetos/editar/{id}', 'edit')->name('projetos.edit')->whereNumber('id');
    Route::get('/projeto/{id}', 'show')->name('projetos.show')->whereNumber('id');

    Route::post('/projetos/salvar', 'store')->name('projetos.store');
    Route::post('/projetos/remover/{id}', 'destroy')->name('projetos.destroy')->whereNumber('id');
    Route::post('/projetos/atualizar/{id}', 'update')->name('projetos.update')->whereNumber('id');
});

// Grupo de rotas para tarefas
Route::controller(TasksController::class)->group(function () {
    // Rotas nomeadas, para evitar que alterações futuras na URL demandem atualização em todas as chamadas da tarefa
    // Nomes em inglês para utilizar o padrão do Laravel
    // Route::get('/tarefas', 'index')->name('tarefas.index');
    Route::get('/tarefas/criar/{id}', 'create')->name('tarefas.create')->whereNumber('id');
    Route::get('/tarefas/editar/{id}', 'edit')->name('tarefas.edit')->whereNumber('id');
    Route::get('/tarefa/{id}', 'show')->name('tarefas.show')->whereNumber('id');

    Route::post('/tarefas/salvar', 'store')->name('tarefas.store');
    Route::post('/tarefas/remover/{id}', 'destroy')->name('tarefas.destroy')->whereNumber('id');
    Route::post('/tarefas/atualizar/{id}', 'update')->name('tarefas.update')->whereNumber('id');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'logar'])->name('logar');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/registrar', [UsersController::class, 'create'])->name('users.create');
Route::post('/registrar', [UsersController::class, 'store'])->name('users.store');
