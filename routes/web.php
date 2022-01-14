<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\cadastroPacienteController;
use App\Http\Controllers\cadastroEspecialidadeController;
use App\Http\Controllers\cadastroMedicoController;
use App\Http\Controllers\cadastroConsultasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/cadastroPaciente', function () {
    return view('cadastroPaciente');
});

Route::get('/cadastroEspecialidade', function () {
    return view('cadastroEspecialidade');
});

Route::get('/cadastroMedico', function () {
    return view('cadastroMedico');
});

Route::get('/cadastroConsulta', function () {
    return view('cadastroConsulta');
});

Route::post('cadastroNovoPaciente', [cadastroPacienteController::class, 'cadastroNovoPaciente']);

Route::post('cadastroNovaEspecialidade', [cadastroEspecialidadeController::class, 'cadastroNovaEspecialidade']);

Route::post('cadastroNovoMedico', [cadastroMedicoController::class, 'cadastroMedico']);

Route::post('cadastroNovaConsulta', [cadastroConsultasController::class, 'cadastroNovaConsultas']);