<?php

use Illuminate\Database\Seeder;

class stopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\stop', 10)->create();
    }
}
