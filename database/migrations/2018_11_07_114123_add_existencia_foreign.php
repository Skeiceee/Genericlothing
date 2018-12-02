<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExistenciaForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('Existencia-Producto', function (Blueprint $table){
          $table->foreign('cod_producto')->references('cod_producto')->on('Producto')->change();
          $table->foreign('cod_talla')->references('cod_talla')->on('Talla')->change();
          $table->foreign('cod_bodega')->references('cod_bodega')->on('Bodega')->change();
          $table->foreign('cod_tienda')->references('cod_tienda')->on('Bodega')->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Existencia-Producto');
    }
}
