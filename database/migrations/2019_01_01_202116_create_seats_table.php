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
            $table->unsignedInteger('reservation_id');
<<<<<<< .merge_file_Eez3ik
            $table->foreign('reservation_id')->references('id')->on('reservations');            
=======
            $table->foreign('reservation_id')->references('id')->on('reservations'); 
            $table->unsignedInteger('flight_id');
            $table->foreign('flight_id')->references('id')->on('flights');            
>>>>>>> .merge_file_nX7m9j
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

