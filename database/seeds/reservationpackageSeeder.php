<?php

use Illuminate\Database\Seeder;

class reservationpackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\reservationpackage',10)->create();
    }
}
