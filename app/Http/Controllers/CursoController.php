<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    public function index()
    {
        $dados = Curso::All();

        return view('Curso.list')->with(['dados' => $dados]);
    }

    function create()
    {
        return view('Curso.form');
    }

    function validationForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'requisito' => 'nullable|string',
            'carga_horaria' => 'nullable|numeric',
            'valor' => 'nullable|numeric',
        ], [
            'nome.required=>"O :attribute é obrigatório!',
            'requisito.string' => "O :attribute deve ser caracter :-|",
            'carga_horaria.numeric'=> "O :attribute deve ser numerico ;^)",

        ]);
    }

    function store(Request $request)
    {
        // dd($request->all());
        $this->validationForm($request);

        Curso::create($request->all());

        return redirect('Curso')->with(compact('data'));
    }

    function edit($id)
    {
        $data = Curso::find($id);
        return view('Curso.form', compact('data'));
    }

    function update(Request $request, $id)
    {
        $this->validationForm($request);

        Curso::find($id)->update($request->all());

        return redirect('Curso')->with("success", 'Registro atualizado com sucesso!');
    }

    function destroy($id)
    {
        Curso::destroy($id);

        return redirect('Curso')->with("success", 'Registro removido com sucesso!');
    }
}
