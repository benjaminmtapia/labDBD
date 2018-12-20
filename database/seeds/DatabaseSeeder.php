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
        $this->call(carSeeder::class);
        $this->call(check_inSeeder::class);
        $this->call(hotelSeeder::class);
        $this->call(hotel_reservationSeeder::class);
        $this->call(purchaseSeeder::class);
        $this->call(packageSeeder::class);
        $this->call(roomSeeder::class);
        $this->call(airportSeeder::class);
        $this->call(destinySeeder::class);
        $this->call(userSeeder::class);
        $this->call(passengerSeeder::class);
        $this->call(originSeeder::class);
        $this->call(socioSeeder::class);
        $this->call(stopSeeder::class);
        $this->call(reservationSeeder::class);
    }
}
