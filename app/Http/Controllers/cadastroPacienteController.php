<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class cadastroPacienteController extends Controller
{
    public static function cadastroNovoPaciente(){
        
        
        $paciente = new Paciente();

        $eror = $paciente->inserePaciente($_POST);
        
        if($eror != []){
            return redirect()->back()->with('alert', $eror[0]);
        }else{
            return redirect('/');
        }
        
    }
}
