<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'paciente';

    protected $fillable = [
        'nome',
        'idade',
        'cpf',
        'dataCadastro' => 'date',
        'telefone',
        'email',
        'cep',
        'endereco',
        'numero_casa',
    ];

    public function inserePaciente($params){

        $select = DB::select("SELECT * FROM paciente WHERE cpf = ?", [$params['cpfPaciente']]);
        $error = [];
        $cpfMaiorIdade = 0;

        foreach($select as $paciente){
            if($paciente->idade >= 18){
                $cpfMaiorIdade = 1;
            }
        }

        if($select != []){
            if($params['idadePaciente'] >= 18 && $cpfMaiorIdade == 1){
                $error[]='Já existe um paciente que utiliza esse cpf';
            }else{
                $insert = DB::insert('INSERT INTO paciente (nome, idade, cpf, dataCadastro, telefone, email, cep, endereco, numero_casa) values (?, ?, ?, ?, ?, ?, ? ,? ,?)', [$params['nomePaciente'], $params['idadePaciente'], $params['cpfPaciente'], $params['dataCadPaciente'], $params['telPaciente'], $params['emailPaciente'], $params['cep'], $params['valorEndereco'], $params['numero']]);
            }
            return $error;
        } else{
            $insert = DB::insert('INSERT INTO paciente (nome, idade, cpf, dataCadastro, telefone, email, cep, endereco, numero_casa) values (?, ?, ?, ?, ?, ?, ? ,? ,?)', [$params['nomePaciente'], $params['idadePaciente'], $params['cpfPaciente'], $params['dataCadPaciente'], $params['telPaciente'], $params['emailPaciente'], $params['cep'], $params['valorEndereco'], $params['numero']]);
            return $error;
        }
    }
}
