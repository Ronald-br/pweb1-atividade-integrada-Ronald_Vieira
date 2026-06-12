<h1>Cadastro de Produto</h1>

<form method="POST" action="/produtos">
    @csrf

    <input type="text" name="nome" placeholder="Nome do produto">

    <button type="submit">Cadastrar</button>
</form>