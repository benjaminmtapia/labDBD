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
        $this->call(packageSeeder::class);
        $this->call(purchaseSeeder::class);
        $this->call(roomSeeder::class);
    }
}
