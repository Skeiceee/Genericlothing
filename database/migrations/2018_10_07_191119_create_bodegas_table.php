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
            $table->smallIncrements('cod_bodega');
            $table->smallInteger('cod_tienda')->unsigned();
            $table->foreign('cod_tienda')->references('cod_tienda')->on('Tienda');
            $table->string('direccion_bodega', 50);
            $table->char('estado', 1);
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
