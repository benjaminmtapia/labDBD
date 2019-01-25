<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_ida');
            $table->smallInteger('capacidad');
            $table->smallInteger('num_pasajeros');
            $table->integer('precio');
            
            $table->integer('origin_id');
            $table->foreign('origin_id')->references('id')->on('origins');
            $table->integer('destiny_id');
            $table->foreign('destiny_id')->references('id')->on('destinies');
             $table->integer('package_id')->nullable('false');
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
        Schema::dropIfExists('flights');
    }
}
