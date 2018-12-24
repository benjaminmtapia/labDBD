<?php

use Illuminate\Database\Seeder;

class destinySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\destiny', 10)->create();
    }
}
