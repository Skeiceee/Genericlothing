<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        genericlothing\User::create([
          'nom_cliente' => 'Admin',
          'apellido_paterno' => 'foo',
          'apellido_materno' => 'bar',
          'rut_cliente' => '00000000-0',
          'cod_ciudad' => '0',
          'telefono' => '00000000',
          'email' => 'admin@genericlothing.com',
          'password' => Hash::make('secret'),
          'estado' => '2',
        ]);
    }
}
