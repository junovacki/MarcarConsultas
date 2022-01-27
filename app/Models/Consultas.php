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
        $paciente = explode(',', $params['cadastroPaciente']);
        $medico = explode(',', $params['cadastroMedico']);
        $error = [];
        if($paciente[1] < 12){
            if($medico[1] !== 'pediatra'){
                $error[]='Pacientes com menos de 12 anos devem se consultar apenas com pediatra!!';
            }else{
                $insert = DB::insert('INSERT INTO consultas (medico, paciente, dataAgentamento, dataConsulta) values (?, ?, ?, ?)', [$medico[0], $paciente[0], $params['cadastroData1'], $params['cadastroData2']]);
            }
        }else{
            $insert = DB::insert('INSERT INTO consultas (medico, paciente, dataAgentamento, dataConsulta) values (?, ?, ?, ?)', [$medico[0], $paciente[0], $params['cadastroData1'], $params['cadastroData2']]);
        }
        
        return $error;
    }
}
