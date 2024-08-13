<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjetosController;
use App\Http\Controllers\TasksController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

    // Rotas personalizadas
    Route::get('/', function () {
        return redirect('/dashboard');
    });


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

        Route::get('/tarefas/exportar', 'export')->name('tarefas.export');

        Route::get('/tarefas/usuario/{id}', 'create_user')->name('tarefas.create_user')->whereNumber('id');;
        Route::post('/tarefas/salvar_usuario', 'store_user')->name('tarefas.store_user');
        Route::post('/tarefas/remover_usuario', 'destroy_user')->name('tarefas.destroy_user');


        Route::post('/tarefas/salvar', 'store')->name('tarefas.store');
        Route::post('/tarefas/remover/{id}', 'destroy')->name('tarefas.destroy')->whereNumber('id');
        Route::post('/tarefas/atualizar/{id}', 'update')->name('tarefas.update')->whereNumber('id');
    });

});
