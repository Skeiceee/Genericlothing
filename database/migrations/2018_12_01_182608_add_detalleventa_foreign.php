<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetalleventaForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Detalle-Venta', function (Blueprint $table) {
            $table->foreign('cod_venta')->references('cod_venta')->on('Venta')->change();
            $table->foreign('cod_producto')->references('cod_producto')->on('Producto')->change();
            $table->foreign('cod_talla')->references('cod_talla')->on('Talla')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Detalle-Venta');
    }
}
