<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class cadastroMedicoController extends Controller
{
    public static function cadastroMedico(){
        $medico = new Medico();

        $error = $medico->insereMedico($_POST);

        if($error != []){
            return redirect()->back()->with('alert', $error[0]);
        }else{
            return redirect('/');
        }
    }
}
