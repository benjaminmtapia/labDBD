<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation-packages', function (Blueprint $table) {
            $table->unsignedInteger('package_id');
            $table->unsignedInteger('reservation_id');
            $table->foreign('package_id')->references('id')->on('packages');
            //$table->foreign('reservation_id')->references('num_reserva')->on('reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation-packages');
    }
}
