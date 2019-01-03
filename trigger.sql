
            CREATE OR REPLACE FUNCTION agregarAsientos()
            RETURNS trigger AS
            $$
                DECLARE
                i INTEGER := 10;
                j INTEGER := 0;
                BEGIN           
                LOOP 
                    EXIT WHEN j = i;
                    j := j + 1;
                    INSERT INTO seats( flight_id,letra,numero,disponibilidad,created_at,updated_at) VALUES 
                    (NEW.id,'a',j,true, NEW.created_at,NEW.updated_at);
                END LOOP ;
                RETURN NEW;
            END
            $$ LANGUAGE plpgsql;

        CREATE TRIGGER crearAsiento AFTER INSERT ON flights FOR EACH ROW
        EXECUTE PROCEDURE agregarAsientos();
        
