<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTiendaEnvioretiroToVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Venta', function (Blueprint $table) {
            $table->smallInteger('cod_tienda')->unsigned();

            $table->foreign('cod_tienda')->references('cod_tienda')->on('Tienda')->change();
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
