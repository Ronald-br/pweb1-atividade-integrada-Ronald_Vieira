<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function index()
    {
        $disciplinas = [
            'Programação Web',
            'Banco de Dados',
            'Estrutura de Dados'
        ];

        return view('disciplinas.index', compact('disciplinas'));
    }

    public function create()
    {
        return view('disciplinas.create');
    }

    public function store(Request $request)
    {
        $nome = $request->nome;

        return "Disciplina cadastrada: " . $nome;
    }

    public function show($id)
    {
        return "Exibindo disciplina de ID: " . $id;
    }
}