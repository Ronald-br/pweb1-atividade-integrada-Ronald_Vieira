<h1>Lista de Cursos</h1>

<ul>
    @foreach($cursos as $curso)
        <li>{{ $curso }}</li>
    @endforeach
</ul>