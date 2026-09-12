@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Novo Aluno</h2>
        <a href="{{ route('alunos.index') }}" class="btn" style="background-color: #E5E7EB; color: #374151;">Voltar</a>
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

    <form action="{{ route('alunos.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="form-label" for="nome">Nome Completo</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome') }}" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="matricula">Matrícula (Código Único)</label>
            <input type="text" id="matricula" name="matricula" class="form-control" value="{{ old('matricula') }}" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="data_nascimento">Data de Nascimento</label>
            <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" value="{{ old('data_nascimento') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Aluno</button>
    </form>
</div>
@endsection
