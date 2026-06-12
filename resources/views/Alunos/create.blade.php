<h1>Cadastrar Aluno</h1>

<form method="POST" action="/alunos">
    @csrf

    <input type="text" name="nome" placeholder="Nome do aluno">

    <button type="submit">Cadastrar</button>
</form>