<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeletivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seletivos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('inicio_inscricao');
            $table->time('hora_inicio_inscricao');
            $table->date('fim_inscricao');
            $table->time('hora_fim_inscricao');
            $table->integer('ano');
            $table->integer('edicao');
            $table->boolean('ativo');
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
        Schema::dropIfExists('seletivos');
    }
}
