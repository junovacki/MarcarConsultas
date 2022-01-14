<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Especialidade extends Model
{
    use HasFactory;

    protected $table = 'especialidade';

    protected $fillable = [
        'nomeEspecialidade',
    ];

    public function insereEspecialidade($params){
        $select = DB::select("SELECT * FROM especialidade WHERE nomeEspecialidade = ?", [$params['nomeEspecialidade']]);
        $error = [];

        if($select != []){
            $error[]='Já existe uma especialidade com esse nome';
            return $error;
        } else{
            $insert = DB::insert('INSERT INTO especialidade (nomeEspecialidade) values (?)', [$params['nomeEspecialidade']]);
            return $error;
        }
    }
}
