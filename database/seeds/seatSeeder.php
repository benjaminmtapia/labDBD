<?php

use Illuminate\Database\Seeder;

class seatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory('App\Seat', 100)->create();
    }
}
