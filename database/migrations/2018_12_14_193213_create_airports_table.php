<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ciudad',60);
            $table->string('nombre',60);
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
        Schema::dropIfExists('airports');
    }
}
