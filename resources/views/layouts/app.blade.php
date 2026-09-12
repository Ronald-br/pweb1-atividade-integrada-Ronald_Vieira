<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Acadêmico Integrado</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar">
        <a href="{{ route('alunos.index') }}" class="navbar-brand">Sistema Acadêmico</a>
        <div class="nav-links">
            <a href="{{ route('alunos.index') }}" class="{{ request()->routeIs('alunos.*') ? 'active' : '' }}">Alunos</a>
            <a href="{{ route('disciplinas.index') }}" class="{{ request()->routeIs('disciplinas.*') ? 'active' : '' }}">Disciplinas</a>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
