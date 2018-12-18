<?php

use Illuminate\Database\Seeder;

class airportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\airport', 10)->create();
    }
}
