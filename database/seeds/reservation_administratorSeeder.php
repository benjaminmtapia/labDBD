<?php

use Illuminate\Database\Seeder;

class reservation_administratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\reservation_administrator',10)->create();
    }
}
