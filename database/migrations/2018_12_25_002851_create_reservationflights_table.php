<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationflightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservationflights', function (Blueprint $table) {
            $table->unsignedInteger('reservation_id');
            $table->unsignedInteger('flight_id');
            $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->foreign('flight_id')->references('id')->on('flights');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservationflights');
    }
}
