@extends('main')
@section('titulo', 'Formulário de cursos')
@section('conteudo')

<div class="container my-4">
    <!-- Botão Voltar Superior -->
    <div class="mb-3">
        <a href="{{ url('curso') }}" class="btn btn-secondary">Voltar</a>
    </div>

    @php
        if (!empty($data->id))
        {
            $action = route('curso.update', $data->id);
        } else {
            $action = route('curso.store');
        }
    @endphp

    <!-- Card do Formulário -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="mb-4">Formulário de Usuário</h3>

            <form action="{{ $action }}" method="POST">
                @csrf
                @if(!empty($data->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id" value="{{ old('id', $data->id ?? '')}}">

                <div class="row g-3">
                    <div class="col-12">
                        <label for="nome" class="form-label"><strong>Nome:</strong></label>
                        <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $data->nome ?? '') }}">
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="requisito" class="form-label"><strong>Requisito:</strong></label>
                        <input type="text" name="requisito" id="requisito" class="form-control" value="{{ old('requisito', $data->requisito ?? '') }}">
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="carga_horaria" class="form-label"><strong>Carga Horaria:</strong></label>
                        <input type="text" name="carga_horaria" id="carga_horaria" class="form-control" value="{{ old('carga_horaria', $data->carga_horaria ?? '') }}">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="valor" class="form-label"><strong>Valor:</strong></label>
                        <input type="text" name="valor" id="valor" class="form-control" value="{{ old('valor', $data->valor ?? '') }}">
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="{{ url('curso') }}" class="btn btn-danger">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
