<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Envio', function (Blueprint $table) {
            $table->integer('cod_venta')->unsigned();
            $table->primary('cod_venta');
            $table->smallInteger('cod_ciudad')->unsigned();
            $table->foreign('cod_ciudad')->references('cod_ciudad')->on('Ciudad');
            $table->integer('telefono');
            $table->integer('precio_envio');
            $table->string('estado');
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
        Schema::dropIfExists('Envio');
    }
}
