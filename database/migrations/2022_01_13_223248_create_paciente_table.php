<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nome');
            $table->string('idade');
            $table->string('cpf');
            $table->date('dataCadastro');
            $table->string('telefone');
            $table->string('email');
            $table->string('cep');
            $table->string('endereco');
            $table->string('numero_casa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paciente');
    }
}
