<?php

use Illuminate\Database\Seeder;

class hotelreservationpackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\hotelreservation_package',10)->create();
    }
}
