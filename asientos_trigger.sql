CREATE OR REPLACE FUNCTION public.agregarasientos()
 RETURNS trigger
 LANGUAGE plpgsql
AS $function$
                DECLARE
                i INTEGER := 10;
                j INTEGER := 0;
                letter CHAR:= 'a';
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
            $function$
