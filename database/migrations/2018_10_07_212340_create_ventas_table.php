<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Venta', function (Blueprint $table) {
            $table->increments('cod_venta');
            $table->string('rut_cliente');
            //$table->foreign('rut_cliente')->references('rut_cliente')->on('Cliente');
            $table->date('fecha');
            $table->integer('total');
            $table->string('tipo');
            $table->string('estado');
            $table->string('envio');
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
        Schema::dropIfExists('Venta');
    }
}
