<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotoCcpusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voto_ccpus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ideleccion');
            $table->foreign('ideleccion')->references('id')->on('eleccion_ccpus');
            $table->unsignedBigInteger('idgrupo');
            $table->foreign('idgrupo')->references('id')->on('grupo_ccpus');
            $table->unsignedBigInteger('idusuario');
            $table->foreign('idusuario')->references('id')->on('users');
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
        Schema::dropIfExists('voto_ccpus');
    }
}
