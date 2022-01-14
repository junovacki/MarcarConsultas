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

        if($select != []){
            $error[]='Já existe um paciente que utiliza esse cpf';
            return $error;
        } else{
            $insert = DB::insert('INSERT INTO paciente (nome, cpf, dataCadastro, telefone, email, cep, endereco, numero_casa) values (?, ?, ?, ?, ?, ? ,? ,?)', [$params['nomePaciente'], $params['cpfPaciente'], $params['dataCadPaciente'], $params['telPaciente'], $params['emailPaciente'], $params['cep'], $params['valorEndereco'], $params['numero']]);
            return $error;
        }
    }
}
