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
            $table->date('fecha_vuelta')->nullable();
            $table->smallInteger('capacidad');
            $table->integer('precio');
            $table->unsignedInteger('origin_id');
            $table->unsignedInteger('destiny_id');
            $table->foreign('origin_id')->references('id')->on('origins');
            $table->foreign('destiny_id')->references('id')->on('destinies');
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
