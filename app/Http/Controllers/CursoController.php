<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        return "Lista de Cursos";
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function listagem()
    {
        $cursos = ["ADS", "Engenharia de Software", "Redes de Computadores"];
        return view('cursos.listagem', compact('cursos'));
    }

    public function show($id)
    {
        return "Curso selecionado: ID $id";
    }
}