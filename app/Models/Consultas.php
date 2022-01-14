<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Consultas extends Model
{
    use HasFactory;

    protected $table = 'especialidade';

    protected $fillable = [
        'medico',
        'paciente',
        'dataAgendamento',
        'dataConsulta',
    ];

    public function insereConsultas($params){
        $insert = DB::insert('INSERT INTO consultas (medico, paciente, dataAgentamento, dataConsulta) values (?, ?, ?, ?)', [$params['cadastroMedico'], $params['cadastroPaciente'], $params['cadastroData1'], $params['cadastroData2']]);
        return true;
    }
}
