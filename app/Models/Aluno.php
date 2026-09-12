<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'matricula',
        'data_nascimento',
    ];

    public function disciplinas()
    {
        return $this->belongsToMany(Disciplina::class, 'aluno_disciplina');
    }
}
