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
                        <label for="curso_id" class="form-label"><strong>Curso:</strong></label>
                        <select name="curso_id" class="form-select">
                            @foreach ($categorias as $item)
                            <option value="{{ $item->id }}">
                                {{ old('curso_id', $data->curso_id ?? '' == $item->id ? 'selected') }}
                                {{ $item->nome }}
                            </option>
                            @endforeach
                    </div>

                    <div class="col-12">
                        <label for="aluno_id" class="form-label"><strong>Curso:</strong></label>
                        <select name="aluno_id" class="form-select">
                            @foreach ($categorias as $item)
                            <option value="{{ $item->id }}">
                                {{ old('aluno_id', $data->aluno_id ?? '' == $item->id ? 'selected') }}
                                {{ $item->nome }}
                            </option>
                            @endforeach
                    </div>

                    <div class="col-12">
                        <label for="aluno_id" class="form-label"><strong>Curso:</strong></label>
                        <select name="aluno_id" class="form-select">
                            @foreach ($categorias as $item)
                            <option value="{{ $item->id }}">
                                {{ old('aluno_id', $data->aluno_id ?? '' == $item->id ? 'selected') }}
                                {{ $item->nome }}
                            </option>
                            @endforeach
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
