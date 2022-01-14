<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medico';

    protected $fillable = [
        'nomeEspecialidade',
        'nomeMedico',
        'CRM',
    ];

    public function insereMedico($params){
        $select = DB::select("SELECT * FROM medico WHERE CRM = ?", [$params['cadastroCRM']]);
        $error = [];

        if($select != []){
            $error[]='Já existe um médico com esse CRM';
            return $error;
        } else{
            $insert = DB::insert('INSERT INTO medico (nomeEspecialidade, nomeMedico, CRM) values (?, ?, ?)', [$params['especialidadeMedico'], $params['nomeMedico'], $params['cadastroCRM']]);
            return $error;
        }
    }
}
