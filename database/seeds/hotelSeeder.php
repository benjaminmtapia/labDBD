<?php

use Illuminate\Database\Seeder;

class hotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Hotel', 10)->create();
    }
}
