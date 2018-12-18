<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(airportSeeder::class);
        $this->call(userSeeder::class);
        $this->call(destinySeeder::class);
        $this->call(originSeeder::class);
        $this->call(passengerSeeder::class);
        $this->call(socioSeeder::class);
        $this->call(stopSeeder::class);
    }
}
