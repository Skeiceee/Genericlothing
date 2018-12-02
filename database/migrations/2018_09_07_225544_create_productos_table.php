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
        $table->smallInteger('cod_tipo_producto')->unsigned();
        $table->foreign('cod_tipo_producto')->references('cod_tipo_producto')->on('Tipo-Producto');
        $table->smallInteger('cod_marca')->unsigned();
        $table->foreign('cod_marca')->references('cod_marca')->on('Marca');
        $table->string('nom_producto', 50);
        $table->string('detalle_producto', 200);
        $table->integer('precio_venta')->unsigned();
        $table->char('estado', 1);
        $table->string('ruta', 1000);
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
