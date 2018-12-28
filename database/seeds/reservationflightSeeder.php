<?php

use Illuminate\Database\Seeder;

class reservationflightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\reservationflight',10)->create();
    }
}
