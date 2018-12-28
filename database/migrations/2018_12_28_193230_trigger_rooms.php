<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TriggerRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
        {
        DB::unprepared('
            CREATE OR REPLACE FUNCTION habilitarDisponibilidad()
            RETURNS trigger AS
            $$
                DECLARE
                limite INTEGER := 10;                
                n INTEGER := 0;                
                disponible BOOLEAN := true;
                valor INTEGER := NEW.id;
                BEGIN
                LOOP
                    EXIT WHEN n = limite; 
                    n := n + 1; 
                    INSERT INTO rooms(hotel_id, numero, capacidad, created_at, updated_at) 
                    VALUES (NEW.id, n, 12, NEW.created_at, NEW.updated_at);
                END LOOP;
                RETURN NEW;
            END
            $$ LANGUAGE plpgsql;
        ');
        DB::unprepared('
        CREATE TRIGGER crearHabitacion AFTER INSERT ON hotels FOR EACH ROW
        EXECUTE PROCEDURE habilitarDisponibilidad();
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
