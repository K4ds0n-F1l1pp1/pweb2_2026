@extends('main')
@section('titulo', 'Formulário de cursos')
@section('conteudo')

<div class="container my-4">
    <div class="mb-3">
        <a href="{{ url('curso') }}" class="btn btn-secondary">Voltar</a>
    </div>

    @php
        if (!empty($data->id))
        {
            $action = route('turma.update', $data->id);
        } else {
            $action = route('turma.store');
        }
    @endphp

    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="mb-4">Formulário de Turma</h3>

            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(!empty($data->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id" value="{{ old('id', $data->id ?? '')}}">

                <div class="row g-3">

                    <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">
                    <input type="hidden" name="curso_id" value="{{ 'curso', $isset($data) ? $data->curso_id : $curso_id }}">
                    <div class="col-12">
                        <label for="nome" class="form-label"><strong>Nome: </strong></label>
                        <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $data->nome ?? '') }}">
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="codigo" class="form-label"><strong>Código: </strong></label>
                        <input type="text" name="codigo" id="codigo" class="form-control" value="{{ old('codigo', $data->codigo ?? '') }}">
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="data_inicio" class="form-label"><strong>Data Início: </strong></label>
                        <input type="date" name="data_inicio" id="data_inicio" class="form-control" value="{{ old('data_inicio', $data->data_inicio ?? '') }}">
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="data_fim" class="form-label"><strong>Data Final: </strong></label>
                        <input type="date" name="data_fim" id="data_fim" class="form-control" value="{{ old('data_fim', $data->data_fim ?? '') }}">
                    </div>

                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="{{ url('cursos.turmas', isset($data) ? $data->curso_id : $curso_id) }}" class="btn btn-danger">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
