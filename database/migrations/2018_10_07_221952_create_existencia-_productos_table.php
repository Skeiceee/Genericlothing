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
        Schema::create('Existencia-Producto', function (Blueprint $table) {
            $table->integer('cod_producto')->unsigned();
            $table->string('cod_talla', 3);
            $table->smallInteger('cod_bodega')->unsigned();
            $table->smallInteger('cod_tienda')->unsigned();
            $table->primary(['cod_producto', 'cod_talla', 'cod_bodega', 'cod_tienda'],  'primaryKeyName');
            $table->string('proveedor', 50);
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
        Schema::dropIfExists('Existencia-Producto');
    }
}
