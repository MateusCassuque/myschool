<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EscolaController;
use App\Http\Controllers\CicloController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\UserController;

Route::get('/',[EscolaController::class, 'index'])->name('home');
Route::post('/escolas', [EscolaController::class, 'store']);
Route::get('/escolas/{id}', [EscolaController::class, 'show'])->name('show');


//Grupo de routas que necessita de autenticação para acessar!
Route::middleware(['auth'])->group( function () {

    Route::get('/create/escola',[EscolaController::class,'create'])->name('criarEscola');

    Route::get('/escolas/create',[EscolaController::class,'create']);

    Route::post('/escolas/ciclo/{id}',[CicloController::class, 'create']);

    Route::get('/escolas/{escola_id}/classes/{classe_id}/show', [
        ClasseController::class, 'show'
    ]);

    Route::get('/escolas/{escola_id}/turma/create', [
        TurmaController::class, 'create'
    ]);

    Route::post('/escolas/{escola_id}/turma', [TurmaController::class, 'store']);

    Route::get('/escola/perfil/curricular', [UserController::class, 'index'])->name('curricular');
});

//Grupo de routas que necessita de autenticação do tipo userAdmin para acessar!
Route::middleware(['userAdmin'])->group( function () {

    Route::post('/mychool/register/funcionario', [UserController::class, 'store'])->name('registarFuncionario');

    Route::get('/sb', function () {
        return view('sobre');
    });
});



//Grupo de routas que necessita de autenticação do tipo userClient para acessar!
Route::middleware(['userclient'])->group( function () {

    Route::get('/sbr', function () {
        return view('inicio');
    });

});

//Grupo de routas que necessita de autenticação do tipo userClient para acessar!
Route::middleware(['auth:sanctum', 'verified'])->group( function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});
