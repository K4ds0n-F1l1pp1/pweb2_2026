<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function index()
    {
        $dados = Aluno::All();

        return view('aluno.list')->with(['dados' => $dados]);
    }

    function create()
    {
        return view('aluno.form');
    }

    function store(Request $request)
    {
        dd($request->all());

        Aluno::create($request->all());

        return redirect('aluno')->with("success", 'Registro salvo com sucesso!');
    }
}
