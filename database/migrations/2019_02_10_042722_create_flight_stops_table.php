<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_stops', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('flight_id');
            $table->foreign('flight_id')->references('id')->on('flights'); 
            $table->unsignedInteger('stop_id');
            $table->foreign('stop_id')->references('id')->on('stops');               
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
        Schema::dropIfExists('flight_stops');
    }
}
