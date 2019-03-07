<?php

use Illuminate\Database\Seeder;

class flightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Flight', 80)->create();
    }
}
