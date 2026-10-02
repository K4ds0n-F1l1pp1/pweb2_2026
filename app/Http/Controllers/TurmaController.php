<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Curso;
use Illuminate\Http\Request;

class TurmaController extends Controller
{

    public function index(Curso $curso)
    {
        $dados = $curso->turmas;

        return view('turma.list')->with([
            'dados' => $dados,
            'cursos' => $curso
            ]);
    }

    public function create(Curso $curso)
    {
        // $curso = Curso::orderBy('nome')->get();

        return view('turma.form')->with(compact('curso'));
    }

    public function validateForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'curso_id' => 'required',
        ], [
            'nome.required' => 'O :attribute é obrigatório!',
        ]);
    }

    public function store(Request $request)
    {
        $this->validateForm($request);

        $data = $request->All();

        $turma = Turma::create($data);

        return redirect()->route('curso.turmas')->with("success", 'Registro salvo com sucesso!');
    }

    public function edit($id)
    {
        $data = Turma::find($id);
        $cursos = Curso::find($data->curso_id);

        return view('turma.form')->with(compact("data", 'cursos'));
    }

    public function update(Request $request, $id)
    {
        $this->validateForm($request);

        $data = $request->All();
        $turma = Turma::find($id)->update($data);

        return redirect()->route('curso.turmas', $turma->curso_id)->with("success", 'Registro editado com sucesso!');
    }

    public function destroy($id)
    {
        $data = Turma::find($id);

        $data = Turma::delete($id);

        return redirect()->route('curso.turmas', $data->curso_id)->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        $curso = Turma::findOrFail($request->curso_id);

        if (!empty($request->valor))
        {
            $dados = Turma::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Turma::All();
        }

        return view('turma.list', compact('dados', 'curso'));
    }
}
