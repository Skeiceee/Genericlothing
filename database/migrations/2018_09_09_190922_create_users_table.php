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
            $table->string('rut_cliente', 10);
            $table->primary('rut_cliente');
            $table->string('email', 25)->unique();
            $table->string('password');
            $table->string('nom_cliente', 50);
            $table->string('apellido_paterno', 20);
            $table->string('apellido_materno', 20);
            $table->integer('telefono');
            $table->smallInteger('cod_ciudad')->unsigned();
            $table->foreign('cod_ciudad')->references('cod_ciudad')->on('Ciudad');
            $table->char('estado', 1);
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
