<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Livros</title>
</head>
<body>

    <h1>Cadastro de Livros</h1>

    @if ($errors->any())
        <div style="color: red;">
            <strong>Erros encontrados:</strong>

            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/livros" method="POST">
        @csrf

        <div>
            <label for="titulo">Título:</label><br>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}">
        </div>

        <br>

        <div>
            <label for="autor">Autor:</label><br>
            <input type="text" name="autor" id="autor" value="{{ old('autor') }}">
        </div>

        <br>

        <div>
            <label for="ano_publicacao">Ano de publicação:</label><br>
            <input type="number" name="ano_publicacao" id="ano_publicacao" value="{{ old('ano_publicacao') }}">
        </div>

        <br>

        <button type="submit">Cadastrar Livro</button>
    </form>

    <hr>

    <h2>Livros cadastrados</h2>

    @if ($livros->count() > 0)
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Ano de publicação</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($livros as $livro)
                    <tr>
                        <td>{{ $livro->id }}</td>
                        <td>{{ $livro->titulo }}</td>
                        <td>{{ $livro->autor }}</td>
                        <td>{{ $livro->ano_publicacao }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhum livro cadastrado.</p>
    @endif

</body>
</html>