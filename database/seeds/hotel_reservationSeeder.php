<?php

use Illuminate\Database\Seeder;

class hotel_reservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\hotel_reservation', 10)->create();
    }
}
