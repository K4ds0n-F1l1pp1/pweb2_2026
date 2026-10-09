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
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Requisito</th>
                        <th scope="col">Carga Horária</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ação</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dados as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->nome }}</td>
                            <td>{{ $item->requisito }}</td>
                            <td>{{ $item->carga_horaria }}</td>
                            <td>{{ $item->valor }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
