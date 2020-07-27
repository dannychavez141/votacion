<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargoCcpusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo_ccpus', function (Blueprint $table) {
            $table->id();
            $table->string('descr',50);
            $table->unsignedBigInteger('idEst');
            $table->foreign('idEst')->references('id')->on('estado_ccpus');
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
        Schema::dropIfExists('cargo_ccpus');
    }
}
