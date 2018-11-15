<?php

use Illuminate\Database\Seeder;

class CiudadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        genericlothing\Ciudad::create([
          'cod_ciudad' => '0',
          'nom_ciudad' => 'foobar',
        ]);
    }
}
