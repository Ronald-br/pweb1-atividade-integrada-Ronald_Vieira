<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\DisciplinaController;

Route::get('/', function () {
    return view('home');
});

Route::get('/sobre', function () {
    return view('sobre');
});

Route::get('/contato', function () {
    return view('contato');
});

Route::get('/institucional/missao', function () {
    return view('missao');
});

Route::get('/institucional/valores', function () {
    return view('valores');
});

/*
|--------------------------------------------------------------------------
| Parte 2 - CursoController
|--------------------------------------------------------------------------
*/

Route::get('/cursos', [CursoController::class, 'index']);
Route::get('/cursos/novo', [CursoController::class, 'create']);
Route::get('/cursos/listagem', [CursoController::class, 'listagem']);
Route::get('/curso/{id}', [CursoController::class, 'show']);

/*
|--------------------------------------------------------------------------
| Parte 3 - Parâmetros
|--------------------------------------------------------------------------
*/

Route::get('/usuario/{nome}', function ($nome) {
    return "Usuário: $nome";
});

/*
|--------------------------------------------------------------------------
| Parte 4.1 - ProdutoController
|--------------------------------------------------------------------------
*/

Route::get('/produtos/create', [ProdutoController::class, 'create']);
Route::post('/produtos', [ProdutoController::class, 'store']);

/*
|--------------------------------------------------------------------------
| Parte 4.2 - DisciplinaController
|--------------------------------------------------------------------------
*/

Route::get('/disciplinas', [DisciplinaController::class, 'index']);

Route::get('/disciplinas/create', [DisciplinaController::class, 'create']);

Route::post('/disciplinas', [DisciplinaController::class, 'store']);

Route::get('/disciplinas/{id}', [DisciplinaController::class, 'show']);