<?php

namespace App\Http\Controllers;

use App\Models\Consultas;
use Illuminate\Http\Request;

class cadastroConsultasController extends Controller
{
    public static function cadastroNovaConsultas(){
        $consultas = new Consultas();

        $error = $consultas->insereConsultas($_POST);

        return redirect('/');
    }
}
