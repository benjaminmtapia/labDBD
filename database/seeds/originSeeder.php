<?php

use Illuminate\Database\Seeder;

class originSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\origin', 10)->create();
    }
}
