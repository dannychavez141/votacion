<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('codMat',11)->unique();
            $table->string('dni',8)->unique();
            $table->string('nomb',100);
            $table->string('apepa',100);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('fmat');
            $table->string('ext',5);
            $table->unsignedBigInteger('idTipo');
            $table->unsignedBigInteger('idEst');
            //$table->foreign('idEst')->references('id')->on('estados');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
