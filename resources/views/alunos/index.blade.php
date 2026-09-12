@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Alunos Matriculados</h2>
        <a href="{{ route('alunos.create') }}" class="btn btn-primary">Novo Aluno</a>
    </div>

    @if($alunos->isEmpty())
        <p>Nenhum aluno cadastrado no sistema.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Disciplinas</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->matricula }}</td>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->email }}</td>
                    <td>
                        <span class="badge">{{ $aluno->disciplinas->count() }}</span>
                    </td>
                    <td>
                        <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-sm btn-primary">Detalhes</a>
                        <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-sm btn-primary" style="background-color: #6B7280;">Editar</a>
                        
                        <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este aluno?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
