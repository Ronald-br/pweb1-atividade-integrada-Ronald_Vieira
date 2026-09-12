@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Detalhes do Aluno: {{ $aluno->nome }}</h2>
        <a href="{{ route('alunos.index') }}" class="btn" style="background-color: #E5E7EB; color: #374151;">Voltar</a>
    </div>

    <div style="margin-bottom: 2rem;">
        <p><strong>Matrícula:</strong> {{ $aluno->matricula }}</p>
        <p><strong>Email:</strong> {{ $aluno->email }}</p>
        <p><strong>Data de Nascimento:</strong> {{ date('d/m/Y', strtotime($aluno->data_nascimento)) }}</p>
    </div>

    <h3 style="margin-bottom: 1rem; border-bottom: 1px solid #E5E7EB; padding-bottom: 0.5rem;">Disciplinas Matriculadas</h3>
    
    @if($aluno->disciplinas->isEmpty())
        <p>Este aluno não está matriculado em nenhuma disciplina.</p>
    @else
        <table class="table" style="margin-bottom: 2rem;">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Disciplina</th>
                    <th>Carga Horária</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($aluno->disciplinas as $disciplina)
                <tr>
                    <td>{{ $disciplina->codigo }}</td>
                    <td>{{ $disciplina->nome }}</td>
                    <td>{{ $disciplina->carga_horaria }}h</td>
                    <td>
                        <form action="{{ route('alunos.desmatricular', [$aluno->id, $disciplina->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Deseja cancelar a matrícula nesta disciplina?')">Desmatricular</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h3 style="margin-bottom: 1rem; border-bottom: 1px solid #E5E7EB; padding-bottom: 0.5rem;">Nova Matrícula</h3>
    
    @if($disciplinasDisponiveis->isEmpty())
        <p>Não há disciplinas disponíveis para matrícula.</p>
    @else
        <form action="{{ route('alunos.matricular', $aluno->id) }}" method="POST" style="display: flex; gap: 1rem; align-items: flex-end;">
            @csrf
            <div class="form-group" style="flex-grow: 1; margin-bottom: 0;">
                <label class="form-label" for="disciplina_id">Selecione uma Disciplina</label>
                <select name="disciplina_id" id="disciplina_id" class="form-control" required>
                    <option value="">-- Escolha --</option>
                    @foreach($disciplinasDisponiveis as $disciplina)
                        <option value="{{ $disciplina->id }}">{{ $disciplina->codigo }} - {{ $disciplina->nome }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="height: 42px;">Matricular Aluno</button>
        </form>
    @endif
</div>
@endsection
