<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf',14)->unique();
            $table->date('data_nascimento');
            $table->string('nome',100);
            $table->string('rg',30);
            $table->string('emissor_rg',100);
            $table->string('responsavel',100)->nullable();
            $table->string('celular',14);
            $table->string('outro_telefone',14)->nullable();
            $table->string('email',50)->nullable();
            $table->string('estuda_em',20);
            
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('cursos');
            
            $table->integer('seletivo_id')->unsigned();
            $table->foreign('seletivo_id')->references('id')->on('seletivos');
            
            $table->unique(['cpf','seletivo_id']);
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
        Schema::dropIfExists('inscricaos');
    }
}
