<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPkToBodega extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Bodega', function (Blueprint $table) {
            DB::statement('ALTER TABLE bodega DROP PRIMARY KEY, ADD PRIMARY KEY (`cod_bodega`, `cod_tienda`) USING BTREE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Bodega');
    }
}
