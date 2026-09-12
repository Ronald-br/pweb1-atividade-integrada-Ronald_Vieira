<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo',
        'carga_horaria',
    ];

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'aluno_disciplina');
    }
}
