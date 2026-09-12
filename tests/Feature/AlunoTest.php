<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Aluno;
use App\Models\Disciplina;

class AlunoTest extends TestCase
{
    use RefreshDatabase;

    public function test_pode_criar_aluno(): void
    {
        $response = $this->post('/alunos', [
            'nome' => 'João Silva',
            'email' => 'joao@example.com',
            'matricula' => '2023001',
            'data_nascimento' => '2000-01-01',
        ]);

        $response->assertRedirect('/alunos');
        $this->assertDatabaseHas('alunos', [
            'email' => 'joao@example.com'
        ]);
    }

    public function test_pode_matricular_aluno_em_disciplina(): void
    {
        $aluno = Aluno::create([
            'nome' => 'Maria Silva',
            'email' => 'maria@example.com',
            'matricula' => '2023002',
            'data_nascimento' => '2000-02-02',
        ]);

        $disciplina = Disciplina::create([
            'nome' => 'Programação Web',
            'codigo' => 'PW01',
            'carga_horaria' => 60,
        ]);

        $response = $this->post("/alunos/{$aluno->id}/matricular", [
            'disciplina_id' => $disciplina->id
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('aluno_disciplina', [
            'aluno_id' => $aluno->id,
            'disciplina_id' => $disciplina->id,
        ]);
    }
}
