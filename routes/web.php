<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\CursoController;

Route::get('/empresa', [PaginaController::class, 'empresa']);

Route::get('/servicos', [PaginaController::class, 'servicos']);

Route::get('/portfolio', [PaginaController::class, 'portfolio']);

Route::get('/blog', [PaginaController::class, 'blog']);

Route::get('/equipe', [PaginaController::class, 'equipe']);

Route::get('/cursos', [CursoController::class, 'index']);

Route::get('/cursos/novo', [CursoController::class, 'create']);

Route::get('/cursos/listagem', [CursoController::class, 'listagem']);