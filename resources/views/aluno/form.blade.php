@extends('main')
@section('titulo', 'Listagem de Alunos')
@section('conteudo')

<div class="row">
    <div class="col">
        <a href="./userList.php" class="btn btn-success">Voltar</a>
    </div>
</div>

<div class="row">
    @php
        if (!empty($dado->id))
        {
            $action = route('aluno.update', $dado->id);
        } else {
            $action = route('aluno.store');
        }
    @endphp
    <div class="col">
        <form action="{{ $action }}" method="POST">s
            @csrf
            <h3>Formulário de Usuário</h3>

            <input type="hidden" name="id" value="{{ old('id', $data->id ?? '')}}">

            <div class="col-6">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome', $data->nome ?? '') }}" maxlength="35" required>
            </div>

            <div class="col-6">
                <label for="cpf">CPF: </label>
                <input type="email" name="cpf" class="form-control" value="{{ old('cpf', $data->cpf ?? '') }}" required>
            </div>

            <div class="col-6">
                <label for="telefone">Telefone: </label>
                <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $data->telefone ?? '') }}" required>
            </div>

            <div class="col mt-4">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="./userList.php" class="btn btn-danger">Voltar</a>
            </div>
        </form>
    </div>
</div>

@stop
