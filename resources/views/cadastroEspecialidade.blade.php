<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Especialidade</title>
    <link rel="stylesheet" href="{{ asset('css/cadastroEspecialidade.css') }}">
</head>
<body id="body">
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
    <div id="formCadastroEspecialidade">
        <form action="{{ url('/cadastroNovaEspecialidade') }}" method="post">
            @csrf
            <div id="cadastroEspecialidade">
                <label for="nomeEspecialidade">Nome da especialidade: </label>
                <input type="text" id="nomeEspecialidade" name="nomeEspecialidade" required/>
            </div>
            
            <input type="submit" value="Enviar" id="submitEspecialidade" />
        </form>
    </div>
</body>
</html>