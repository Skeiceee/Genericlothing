<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCodtallaToDetallepedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Detalle-Pedido', function (Blueprint $table) {
            $table->string('cod_talla', 3);
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
        Schema::dropIfExists('Detalle-Pedido');
    }
}
