<h1>Cadastro de Disciplina</h1>

<form method="POST" action="/disciplinas">
    @csrf

    <label>Nome da disciplina:</label>
    <input type="text" name="nome">

    <button type="submit">
        Cadastrar
    </button>
</form>