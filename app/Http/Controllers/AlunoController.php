<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Disciplina;
use App\Services\MatriculaService;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    protected $matriculaService;

    public function __construct(MatriculaService $matriculaService)
    {
        $this->matriculaService = $matriculaService;
    }

    public function index()
    {
        $alunos = Aluno::with('disciplinas')->get();
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos',
            'matricula' => 'required|string|unique:alunos',
            'data_nascimento' => 'required|date',
        ]);

        Aluno::create($validated);

        return redirect()->route('alunos.index')->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function show(Aluno $aluno)
    {
        $disciplinasDisponiveis = Disciplina::whereNotIn('id', $aluno->disciplinas->pluck('id'))->get();
        return view('alunos.show', compact('aluno', 'disciplinasDisponiveis'));
    }

    public function edit(Aluno $aluno)
    {
        return view('alunos.edit', compact('aluno'));
    }

    public function update(Request $request, Aluno $aluno)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email,' . $aluno->id,
            'matricula' => 'required|string|unique:alunos,matricula,' . $aluno->id,
            'data_nascimento' => 'required|date',
        ]);

        $aluno->update($validated);

        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('alunos.index')->with('success', 'Aluno removido com sucesso!');
    }

    public function matricular(Request $request, Aluno $aluno)
    {
        $request->validate(['disciplina_id' => 'required|exists:disciplinas,id']);
        
        $sucesso = $this->matriculaService->matricular($aluno, $request->disciplina_id);

        if ($sucesso) {
            return back()->with('success', 'Aluno matriculado na disciplina!');
        }
        
        return back()->with('error', 'Aluno já está matriculado nesta disciplina.');
    }
    
    public function desmatricular(Aluno $aluno, Disciplina $disciplina)
    {
        $this->matriculaService->desmatricular($aluno, $disciplina->id);
        return back()->with('success', 'Matrícula removida com sucesso!');
    }
}
