<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Turma;
use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {
        $dados = Matricula::All();

        return view('matricula.list')->with(['dados' => $dados]);
    }

    function create()
    {
        $curso = Curso::orderBy('nome')->get();
        $turma = Turma::orderBy('nome')->get();
        $aluno = Aluno::orderBy('nome')->get();

        return view('matricula.form')->with(compact('curso', 'aluno', 'turma'));
    }

    function validationForm(Request $request)
    {
        $request->validate([
            'curso_id' => 'required|exists: cursos, id',
            'turma_id' => 'required|exist: turmas, id',
            'aluno_id' => 'required|exist: aluno, id',
            'data_matricula' => 'required',
        ], [
            'curso_id.required' => "O :attribute é obrigatório!",
            'turma_id.required' => "O :attribute é obrigatório!",
            'aluno_id.required' => "O :attribute é obrigatório!",
            'data_matricula.required' => "O :attribute é obrigatório!"
        ]);
    }

    function store(Request $request)
    {
        // dd($request->all());
        $this->validationForm($request);

        Matricula::create($request->all());

        return redirect('matricula')->with("success", 'Registro salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Matricula::find($id);
        $curso = Curso::orderBy('nome')->get();
        $turma = Turma::orderBy('nome')->get();
        $aluno = Aluno::orderBy('nome')->get();

        return view('matricula.form')->with(compact('data', 'curso', 'aluno', 'turma'));
    }

    function update(Request $request, $id)
    {
        $this->validationForm($request);

        Matricula::find($id)->update($request->all());

        return redirect('matricula')->with("success", 'Registro atualizado com sucesso!');
    }

    function destroy($id)
    {
        Matricula::destroy($id);

        return redirect('matricula')->with("success", 'Registro removido com sucesso!');
    }
}
