<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeatsTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE OR REPLACE FUNCTION agregarAsientos()
            RETURNS trigger AS
            $$
                DECLARE
                i INTEGER := 10;
                j INTEGER := 0;
                letter CHAR:= \'a\';
                valor INTEGER := NEW.id;
                BEGIN           
                LOOP 
                    EXIT WHEN j = i;
                    j := j + 1;
                    INSERT INTO seats( flight_id,letra,numero,disponibilidad,created_at,updated_at) VALUES 
                    (valor,letter,j,true, NEW.created_at,NEW.updated_at);
                END LOOP ;
                RETURN NEW;
            END
            $$ LANGUAGE plpgsql;
        ');
        DB::unprepared('
        CREATE TRIGGER crearAsiento AFTER INSERT ON flights FOR EACH ROW
        EXECUTE PROCEDURE agregarAsientos();
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seats_trigger');
    }
}
