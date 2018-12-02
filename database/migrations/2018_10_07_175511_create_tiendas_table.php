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
            $table->smallIncrements('cod_tienda');
            $table->smallInteger('cod_ciudad')->unsigned();
            $table->foreign('cod_ciudad')->references('cod_ciudad')->on('Ciudad');
            $table->string('nom_tienda', 50);
            $table->string('direccion_tienda', 50);
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
        Schema::dropIfExists('Tienda');
    }
}
