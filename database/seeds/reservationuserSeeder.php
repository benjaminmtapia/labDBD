<?php

use Illuminate\Database\Seeder;

class reservationuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\ReservationUser',10)->create();
    }
}
