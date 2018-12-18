<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Detalle-Pedido', function (Blueprint $table) {
            $table->integer('cod_pedido')->unsigned();
            $table->integer('cod_producto')->unsigned();
            $table->string('cod_talla',3);
            $table->primary(['cod_pedido', 'cod_producto','cod_talla'], 'cod_detalle_pedido');
            $table->smallInteger('cantidad');
            $table->integer('precio_venta');
            $table->integer('subtotal');
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
