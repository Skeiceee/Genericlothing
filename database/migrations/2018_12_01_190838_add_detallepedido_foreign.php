<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetallepedidoForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Detalle-Pedido', function (Blueprint $table) {
            $table->foreign('cod_pedido')->references('cod_pedido')->on('Pedido')->change();
            $table->foreign('cod_producto')->references('cod_producto')->on('Producto')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Detalle-Pedido');
    }
}
