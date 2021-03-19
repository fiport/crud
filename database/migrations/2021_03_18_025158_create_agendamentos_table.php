<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->string('inputName');
            $table->string('inputNumber');
            $table->string('inputEmail');
            $table->string('inputEndereco');
            $table->string('inputCEP');
            $table->string('intpuN');
            $table->string('inputCity');
            $table->string('inputBairro');
            $table->string('inputEstado');

            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
}
