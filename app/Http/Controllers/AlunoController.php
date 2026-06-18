<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = ["Ana", "Bruno", "Carlos"];
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        return "Aluno cadastrado: " . $request->nome;
    }

    public function show($id)
    {
        return "Aluno selecionado: ID $id";
    }
}