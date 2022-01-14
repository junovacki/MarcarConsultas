<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Médico</title>
    <link rel="stylesheet" href="{{ asset('css/cadastroMedico.css') }}">
</head>
<?php
use Illuminate\Support\Facades\DB;
      $options = DB::table('especialidade')->get()->pluck('nomeEspecialidade','id');
      
  ?>
<body id="body">
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
    <div id="formCadastro">
        <form action="{{ url('/cadastroNovoMedico') }}" method="post">
            @csrf
            <div id="cadastroNome">
                <label for="nomeMedico">Nome do médico: </label>
                <input type="text" id="nomeMedico" name="nomeMedico" required/>
            </div>
            <div id="cadastroEspecialidade">
                <label for="especialidadeMedico">Especialidade do médico: </label>
                <select name="especialidadeMedico" id="especialidadeMedico">
                @foreach ($options as $key => $value)
                    <option value="{{ $value }}"
                    >{{ $value }}</option>
                @endforeach
                </select>
            </div>
            <div id="campoCRM">
                <label for="cadastroCRM">CRM do médico:</label>
                <input type="text" id="cadastroCRM" name="cadastroCRM" required/>
            </div>
            <input type="submit" value="Enviar" id="submitMedico" />
        </form>
    </div>
    
</body>
</html>