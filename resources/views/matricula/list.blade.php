@extends('main')
@section('titulo', 'Listagem de Aluno')
@section('conteudo')

<div class="container my-4">
    <div class="row mb-4">
        <div class="col-12">
            <h3>Listagem de Matrículas</h3>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="userList.php" method="POST" class="row g-3 align-items-end">
                <div class="col-md-4 col-sm-12">
                    <label for="tipo" class="form-label"><strong>Tipo:</strong></label>
                    <select name="tipo" id="tipo" class="form-control">
                        <option value=""></option>
                        <option value="nome_curso">Curso</option>
                        <option value="nome_turma">Turma</option>
                        <option value="nome_aluno">Aluno</option>
                    </select>
                </div>

                <div class="col-md-5 col-sm-12">
                    <label for="valor" class="form-label"><strong>Valor:</strong></label>
                    <input type="text" name="valor" id="valor" class="form-control" placeholder="Pesquisar...">
                </div>

                <div class="col-md-3 col-sm-12">
                    <button type="submit" name="btn-buscar" class="btn btn-primary w-100">Buscar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="mb-3">
        <a href="{{ url('matricula/create') }}" class="btn btn-success">Adicionar Novo</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">CURSO</th>
                            <th scope="col">TURMA</th>
                            <th scope="col">ALUNO</th>
                            <th scope="col">DATA MATRÍCULA</th>
                            <th scope="col" colspan="2" class="text-center">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dados as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->cursos->nome }}</td>
                                <td>{{ $item->turmas->nome }}</td>
                                <td>{{ $item->alunos->nome }}</td>
                                <td>{{ date('d/m/y', strtotime($item->data_matricula )) }}</td>
                                <td style="width: 80px;">
                                    <a class="btn btn-warning btn-sm"
                                       title="Editar"
                                       href="{{ route('matricula.edit', $item->id) }}">
                                        Editar
                                    </a>
                                </td>
                                <td style="width: 80px;">
                                    <form action="{{ route(destroy('matricula.destroy', $item->id)) }}" method="POST"></form>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                       onclick="return confirm('Tem certeza que deseja excluir este usuário?\')">
                                        Excluir
                                    </button>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop
