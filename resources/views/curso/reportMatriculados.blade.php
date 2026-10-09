<!DOCTYPE html>
<html>
    <head>
        <title>Listagem de Cursos</title>
        <link rel="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>

    <body>
        <div class="row">
            <h3>Listagem de Cursos</h3>
        </div>

        <div class="row mt-4">
                    @foreach ($dados as $item)
                        <h4>Curso: $item->nome</h4>

                        @if ($item->alunos->isEmpty())
                        {
                            <p>Nenhum aluno matrículado nesse curso.</p>
                        } @else
                        <table class="table table-striped table-hover">
                            <tbody>
                                <p>Total de alunos matrículados nesse curso: {{ $item->alunos->count() }}</p>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">CPF</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Data de Matrícula</th>
                                        <th scope="col">Ação</th>
                                        <th scope="col">Ação</th>
                                    </tr>
                                </thead>
                            </tbody>
                        </table>
                        <tr>
                            <th scope="row">{{ $item->alunos as $aluno }}</th>
                            <td>{{ $aluno->nome }}</td>
                            <td>{{ $aluno->cpf }}</td>
                            <td>{{ $aluno->telefone }}</td>
                            <td>R${{ $aluno->categoria->nome :: ' - ' }}</td>
                            <td>R${{ $dataMatricula :: ' - ' }}</td>
                        </tr>
                    @endforeach
        </div>
    </body>
</html>
