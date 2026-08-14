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

    function validationForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
        ], [
            'nome.required=>"O :attribute é obrigatório!',
            'cpf.required' => "O :attribute é obrigatório!"
        ]);
    }

    function store(Request $request)
    {
        // dd($request->all());
        $this->validationForm($request);

        Aluno::create($request->all());

        return redirect('aluno')->with("success", 'Registro salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Aluno::find($id);
        return view('aluno.form', compact('data'));
    }

    function update(Request $request, $id)
    {
        $this->validationForm($request);

        Aluno::find($id)->update($request->all());

        return redirect('aluno')->with("success", 'Registro atualizado com sucesso!');
    }

    function destroy($id)
    {
        Aluno::destroy($id);

        return redirect('aluno')->with("success", 'Registro removido com sucesso!');
    }
}
