@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Nova Disciplina</h2>
        <a href="{{ route('disciplinas.index') }}" class="btn" style="background-color: #E5E7EB; color: #374151;">Voltar</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul style="margin-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('disciplinas.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="form-label" for="nome">Nome da Disciplina</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome') }}" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="codigo">Código Único</label>
            <input type="text" id="codigo" name="codigo" class="form-control" value="{{ old('codigo') }}" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="carga_horaria">Carga Horária (horas)</label>
            <input type="number" id="carga_horaria" name="carga_horaria" class="form-control" value="{{ old('carga_horaria') }}" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Disciplina</button>
    </form>
</div>
@endsection
