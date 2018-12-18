<?php

use Illuminate\Database\Seeder;

class socioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\socio', 10)->create();
    }
}
