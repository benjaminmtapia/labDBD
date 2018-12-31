<?php

use Illuminate\Database\Seeder;

class flightpackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\flightpackage',10)->create();
    }
}
