<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExistenciaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Existencia-producto', function (Blueprint $table) {
            $table->integer('cod_producto');
            $table->integer('cod_talla');
            $table->integer('cod_bodega');
            $table->integer('cod_tienda');
            $table->string('proveedor');
            $table->integer('precio_compra');
            $table->integer('cantidad');
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
        Schema::dropIfExists('Existencia-producto');
    }
}
