<?php

namespace App\Services;

use App\Models\Aluno;
use App\Models\Disciplina;

class MatriculaService
{
    /**
     * Matricula um aluno em uma disciplina específica.
     *
     * @param Aluno $aluno
     * @param int $disciplinaId
     * @return bool
     */
    public function matricular(Aluno $aluno, int $disciplinaId)
    {
        // Verifica se a disciplina existe
        $disciplina = Disciplina::findOrFail($disciplinaId);
        
        // Verifica se o aluno já está matriculado nesta disciplina
        if ($aluno->disciplinas()->where('disciplina_id', $disciplina->id)->exists()) {
            return false;
        }
        
        // Realiza a matrícula anexando a disciplina ao aluno
        $aluno->disciplinas()->attach($disciplina->id);
        
        return true;
    }

    /**
     * Remove a matrícula de um aluno em uma disciplina.
     *
     * @param Aluno $aluno
     * @param int $disciplinaId
     * @return void
     */
    public function desmatricular(Aluno $aluno, int $disciplinaId)
    {
        $aluno->disciplinas()->detach($disciplinaId);
    }
}
