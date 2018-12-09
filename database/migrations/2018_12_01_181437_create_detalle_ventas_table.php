<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Detalle-Venta', function (Blueprint $table) {
            $table->integer('cod_venta')->unsigned();
            $table->integer('cod_producto')->unsigned();
            $table->string('cod_talla',3);
            $table->primary(['cod_venta', 'cod_producto','cod_talla'], 'cod_detalle_venta');
            $table->smallInteger('cantidad');
            $table->integer('precio_venta');
            $table->integer('subtotal');
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
        Schema::dropIfExists('Detalle-Venta');
    }
}
