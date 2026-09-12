<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\DisciplinaController;

Route::get('/', function () {
    return redirect()->route('alunos.index');
});

// Rotas para Alunos
Route::resource('alunos', AlunoController::class);
Route::post('alunos/{aluno}/matricular', [AlunoController::class, 'matricular'])->name('alunos.matricular');
Route::delete('alunos/{aluno}/desmatricular/{disciplina}', [AlunoController::class, 'desmatricular'])->name('alunos.desmatricular');

// Rotas para Disciplinas
Route::resource('disciplinas', DisciplinaController::class);
