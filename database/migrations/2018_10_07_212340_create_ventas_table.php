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
            $table->string('rut_cliente', 10);
            $table->foreign('rut_cliente')->references('rut_cliente')->on('Cliente');
            $table->date('fecha');
            $table->integer('total');
            $table->char('tipo', 1);
            $table->char('envio', 1);
            $table->char('estado', 1);
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
