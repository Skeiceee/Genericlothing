<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cliente', function (Blueprint $table) {
            $table->string('rut_cliente');
            $table->string('nom_cliente');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->integer('telefono');
            $table->smallInteger('cod_ciudad')->unsigned();
            $table->foreign('cod_ciudad')->references('cod_ciudad')->on('Ciudad');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('estado');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cliente');
    }
}
