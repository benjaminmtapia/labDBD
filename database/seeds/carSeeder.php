<?php

use Illuminate\Database\Seeder;

class carSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\car', 50)->create();
    }
}
