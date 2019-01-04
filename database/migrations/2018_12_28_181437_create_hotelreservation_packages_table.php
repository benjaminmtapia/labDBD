<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelreservationPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotelreservation_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hotel_reservation_id');
            $table->unsignedInteger('package_id');
            $table->foreign('hotel_reservation_id')->references('id')->on('hotel_reservations');
            $table->foreign('package_id')->references('id')->on('packages');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotelreservation_packages');
    }
}
