<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->integer('precio');
            $table->unsignedInteger('passenger_id');
            $table->foreign('passenger_id')->references('id')->on('passengers');
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
        Schema::dropIfExists('secures');
    }
}
