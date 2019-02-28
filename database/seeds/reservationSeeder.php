<?php

use Illuminate\Database\Seeder;

class reservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory('App\reservation', 1)->create();
    }
}
