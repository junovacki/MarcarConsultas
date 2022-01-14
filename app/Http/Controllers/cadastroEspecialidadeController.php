<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use Illuminate\Http\Request;

class cadastroEspecialidadeController extends Controller
{
    public static function cadastroNovaEspecialidade(){
        $especialidade = new Especialidade();

        $error = $especialidade->insereEspecialidade($_POST);

        if($error != []){
            return redirect()->back()->with('alert', $error[0]);
        }else{
            return redirect('/');
        }
    }
}
