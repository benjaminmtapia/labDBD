<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('cantidad_personas');
            $table->unsignedInteger('room_id');
            $table->unsignedInteger('package_id');
            $table->unsignedInteger('reservation_id');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('reservation_id')->references('id')->on('reservations');
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
        Schema::dropIfExists('hotel_reservations');
    }
}
