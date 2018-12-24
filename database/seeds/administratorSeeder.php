<?php

use Illuminate\Database\Seeder;

class administratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\administrator', 10)->create();
    }
}
