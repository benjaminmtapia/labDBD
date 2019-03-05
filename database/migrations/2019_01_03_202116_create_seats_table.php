<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->increments('id');
            $table->char('letra',1);
            $table->integer('numero');
            $table->boolean('disponibilidad');
            $table->integer('precio');
            $table->string('tipo');
            $table->boolean('check_in');
            $table->unsignedInteger('reservation_id')->nullable();
            $table->unsignedInteger('package_id');
            $table->unsignedInteger('flight_id');
            $table->unsignedInteger('passenger_id');
            $table->foreign('reservation_id')->references('id')->on('reservations'); 
             $table->foreign('passenger_id')->references('id')->on('passengers'); 
            $table->foreign('flight_id')->references('id')->on('flights');
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
        Schema::dropIfExists('seats');
    }
}

