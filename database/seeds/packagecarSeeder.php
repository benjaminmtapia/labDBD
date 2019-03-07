<?php

use Illuminate\Database\Seeder;

class packagecarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\packagecar', 10)->create();
    }
}
