<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodegasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bodega', function (Blueprint $table) {
            $table->increments('cod_bodega');
            $table->integer('cod_tienda')->unsigned();
            $table->foreign('cod_tienda')->references('cod_tienda')->on('Tienda');
            $table->string('direccion_bodega');
            $table->string('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Bodega');
    }
}
