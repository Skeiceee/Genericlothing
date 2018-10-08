<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tienda', function (Blueprint $table) {
            $table->increments('cod_tienda');
            $table->smallInteger('cod_ciudad')->unsigned();
            $table->foreign('cod_ciudad')->references('cod_ciudad')->on('Ciudad');
            $table->string('nom_tienda');
            $table->string('direccion_tienda');
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
        Schema::dropIfExists('Tienda');
    }
}
