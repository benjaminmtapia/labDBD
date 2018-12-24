<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('monto');
            $table->integer('num_pasaporte');
            $table->integer('num_reserva_hotel');
            
            $table->integer('origin_id');
            $table->integer('destiny_id');
            $table->foreign('destiny_id')->references('id')->on('destinies');
            $table->foreign('origin_id')->references('id')->on('origins');
            
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
        Schema::dropIfExists('reservations');
    }
}
