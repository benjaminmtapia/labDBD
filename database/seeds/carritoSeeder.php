<?php

use Illuminate\Database\Seeder;

class carritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Carrito', 10)->create();
    }
}
