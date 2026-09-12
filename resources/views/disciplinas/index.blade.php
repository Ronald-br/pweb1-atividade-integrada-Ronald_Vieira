@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Disciplinas Cadastradas</h2>
        <a href="{{ route('disciplinas.create') }}" class="btn btn-primary">Nova Disciplina</a>
    </div>

    @if($disciplinas->isEmpty())
        <p>Nenhuma disciplina cadastrada no sistema.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Carga Horária</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($disciplinas as $disciplina)
                <tr>
                    <td>{{ $disciplina->codigo }}</td>
                    <td>{{ $disciplina->nome }}</td>
                    <td>{{ $disciplina->carga_horaria }}h</td>
                    <td>
                        <a href="{{ route('disciplinas.edit', $disciplina->id) }}" class="btn btn-sm btn-primary" style="background-color: #6B7280;">Editar</a>
                        
                        <form action="{{ route('disciplinas.destroy', $disciplina->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta disciplina?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
