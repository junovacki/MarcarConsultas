<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Consultas</title>
    <link rel="stylesheet" href="{{ asset('css/cadastroConsulta.css') }}">
</head>
<?php
use Illuminate\Support\Facades\DB;
      $optionsE = DB::table('medico')->get()->pluck('nomeEspecialidade','nomeMedico','id');
      $optionsP = DB::table('paciente')->get()->pluck('idade', 'nome','id');
      //dd($optionsP);
      
  ?>
<body id="body">
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
    <div id="formCadastro">
        <form action="{{ url('/cadastroNovaConsulta') }}" method="post">
            @csrf
            
            <div id="campocadastroMedico">
                <label for="cadastroMedico">Médico: </label>
                <select name="cadastroMedico" id="cadastroMedico">
                @foreach ($optionsE as $key => $value)
                    <option value="{{ $key }},{{ $value }}"
                    >{{ $key }}</option>
                @endforeach
                </select>
            </div>
            <div id="campocadastroPaciente">
                <label for="cadastroPaciente">Paciente: </label>
                <select name="cadastroPaciente" id="cadastroPaciente">
                @foreach ($optionsP as $key => $value)
                    <option value='{{ $key }},{{ $value }}' 
                    >{{ $key }}</option>
                    
                @endforeach
                </select>
            </div>
            <div id="campoData1">
                <label for="cadastroData1">Data do agendamento:</label>
                <input type="date" id="cadastroData1" name="cadastroData1" required/>
            </div>
            <div id="campoData2">
                <label for="cadastroData2">Data da consulta:</label>
                <input type="date" id="cadastroData2" name="cadastroData2" required/>
            </div>
            <input type="submit" value="Enviar" id="submitConsulta" />
        </form>
    </div>
</body>
</html>