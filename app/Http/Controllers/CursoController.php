<?php

namespace App\Http\Controllers;

class CursoController extends Controller
{
    public function index()
    {
        return 'Lista de Cursos';
    }

    public function create()
    {
        return view('cursos.create', [
            'titulo' => 'Cadastro de Curso'
        ]);
    }

    public function listagem()
    {
        $cursos = [
            'Análise e Desenvolvimento de Sistemas',
            'Redes de Computadores',
            'Banco de Dados'
        ];

        return view('cursos.listagem', compact('cursos'));
    }
}