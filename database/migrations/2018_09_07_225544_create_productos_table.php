<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Producto', function (Blueprint $table){
        $table->increments('cod_producto');
        $table->integer('cod_tipo_producto')->unsigned();
        $table->foreign('cod_tipo_producto')->references('cod_tipo_producto')->on('Tipo-Producto');
        $table->integer('cod_marca')->unsigned();
        $table->foreign('cod_marca')->references('cod_marca')->on('Marca');
        $table->string('nom_producto');
        $table->integer('precio_venta')->unsigned();
        $table->integer('estado');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Producto');
    }
}
