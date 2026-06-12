<h1>Lista de Alunos</h1>

<ul>
    @foreach($alunos as $aluno)
        <li>{{ $aluno }}</li>
    @endforeach
</ul>