<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegranteCcpusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrante_ccpus', function (Blueprint $table) {
            $table->unsignedBigInteger('idgrupo');
            $table->foreign('idgrupo')->references('id')->on('grupo_ccpus');
            $table->unsignedBigInteger('idusuario');
            $table->foreign('idusuario')->references('id')->on('users');
            $table->unsignedBigInteger('idcargo');
            $table->foreign('idcargo')->references('id')->on('cargo_ccpus');
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
        Schema::dropIfExists('integrante_ccpus');
    }
}
