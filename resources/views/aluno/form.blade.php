@extends('main')
@section('titulo', 'Formulário de Alunos')
@section('conteudo')

<div class="container my-4">
    <!-- Botão Voltar Superior -->
    <div class="mb-3">
        <a href="{{ url('aluno') }}" class="btn btn-secondary">Voltar</a>
    </div>

    @php
        if (!empty($data->id))
        {
            $action = route('aluno.update', $data->id);
        } else {
            $action = route('aluno.store');
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
                        <label for="cpf" class="form-label"><strong>CPF:</strong></label>
                        <input type="text" name="cpf" id="cpf" class="form-control" value="{{ old('cpf', $data->cpf ?? '') }}">
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="telefone" class="form-label"><strong>Telefone:</strong></label>
                        <input type="text" name="telefone" id="telefone" class="form-control" value="{{ old('telefone', $data->telefone ?? '') }}">
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="{{ url('aluno') }}" class="btn btn-danger">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
