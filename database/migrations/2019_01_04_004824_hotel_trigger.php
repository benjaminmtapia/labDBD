<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE OR REPLACE FUNCTION eliminarHabitaciones()
            RETURNS trigger AS
            $$
              BEGIN
              DELETE FROM rooms
              WHERE rooms.hotel_id = OLD.id;
              IF NOT FOUND THEN RETURN NULL; END IF;
              OLD.updated_at = now();            
              RETURN OLD;
              END
            $$ LANGUAGE plpgsql;
        ');
        DB::unprepared('
            CREATE TRIGGER eliminarHabitaciones BEFORE DELETE ON hotels FOR EACH ROW
            EXECUTE PROCEDURE eliminarHabitaciones();
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
