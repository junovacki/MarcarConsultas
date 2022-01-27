<?php

namespace App\Http\Controllers;

use App\Models\Consultas;
use Illuminate\Http\Request;

class cadastroConsultasController extends Controller
{
    public static function cadastroNovaConsultas(){
        $consultas = new Consultas();

        $error = $consultas->insereConsultas($_POST);

        if($error != []){
            return redirect()->back()->with('alert', $error[0]);
        }else{
            return redirect('/');
        }

    }
}
