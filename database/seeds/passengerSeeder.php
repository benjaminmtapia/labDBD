<?php

use Illuminate\Database\Seeder;

class passengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\passenger', 10)->create();
    }
}
