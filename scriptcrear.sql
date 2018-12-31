CreateUsersTable: create table "users" ("id" serial primary key not null, "name" varchar(255) not null, "email" varchar(255) not null, "email_verified_at" timestamp(0) without time zone null, "password" varchar(255) not null, "remember_token" varchar(100) null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateUsersTable: alter table "users" add constraint "users_email_unique" unique ("email")
CreatePasswordResetsTable: create table "password_resets" ("email" varchar(255) not null, "token" varchar(255) not null, "created_at" timestamp(0) without time zone null)
CreatePasswordResetsTable: create index "password_resets_email_index" on "password_resets" ("email")
CreateDestiniesTable: create table "destinies" ("id" serial primary key not null, "ciudad" varchar(60) not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateOriginsTable: create table "origins" ("id" serial primary key not null, "ciudad" varchar(60) not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateReservationsTable: create table "reservations" ("id" serial primary key not null, "monto" integer not null, "num_pasaporte" integer not null, "num_reserva_hotel" integer not null, "origin_id" integer not null, "destiny_id" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateReservationsTable: alter table "reservations" add constraint "reservations_destiny_id_foreign" foreign key ("destiny_id") references "destinies" ("id")
CreateReservationsTable: alter table "reservations" add constraint "reservations_origin_id_foreign" foreign key ("origin_id") references "origins" ("id")
CreateAirportsTable: create table "airports" ("id" serial primary key not null, "ciudad" varchar(60) not null, "nombre" varchar(60) not null, "origin_id" integer not null, "destiny_id" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateAirportsTable: alter table "airports" add constraint "airports_origin_id_foreign" foreign key ("origin_id") references "origins" ("id")
CreateAirportsTable: alter table "airports" add constraint "airports_destiny_id_foreign" foreign key ("destiny_id") references "destinies" ("id")
CreateSociosTable: create table "socios" ("id" serial primary key not null, "numero" integer not null, "email" varchar(255) not null, "millas" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateFlightsTable: create table "flights" ("id" serial primary key not null, "fecha_ida" date not null, "capacidad" smallint not null, "num_pasajeros" smallint not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateAdministratorsTable: create table "administrators" ("id" serial primary key not null, "nombre" varchar(40) not null, "apellido" varchar(40) not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateTicketsTable: create table "tickets" ("id" serial primary key not null, "num_asiento" smallint not null, "hora" timestamp(0) without time zone not null, "origen" varchar(80) not null, "destino" varchar(80) not null, "doc_identificacion" varchar(40) not null, "tipo_pasajero" varchar(20) not null, "flight_id" integer not null, "reservation_id" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateTicketsTable: alter table "tickets" add constraint "tickets_flight_id_foreign" foreign key ("flight_id") references "flights" ("id")
CreateTicketsTable: alter table "tickets" add constraint "tickets_reservation_id_foreign" foreign key ("reservation_id") references "reservations" ("id")
CreateCheckInsTable: create table "check_ins" ("id" serial primary key not null, "cuenta" integer not null, "num_vuelo" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreatePurchasesTable: create table "purchases" ("id" serial primary key not null, "fecha" timestamp(0) without time zone not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateStopsTable: create table "stops" ("id" serial primary key not null, "nombre" varchar(60) not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreatePassengersTable: create table "passengers" ("id" serial primary key not null, "nombre" varchar(255) not null, "apellido" varchar(255) not null, "num_asiento" integer not null, "flight_id" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreatePassengersTable: alter table "passengers" add constraint "passengers_flight_id_foreign" foreign key ("flight_id") references "flights" ("id")
CreatePackagesTable: create table "packages" ("id" serial primary key not null, "descuento" integer not null, "fecha_vencimiento" timestamp(0) without time zone not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateCarsTable: create table "cars" ("id" serial primary key not null, "patente" varchar(255) not null, "marca" varchar(255) not null, "modelo" varchar(255) not null, "capacidad" decimal(8, 2) not null, "package_id" integer not null, "reservation_id" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateCarsTable: alter table "cars" add constraint "cars_package_id_foreign" foreign key ("package_id") references "packages" ("id")
CreateCarsTable: alter table "cars" add constraint "cars_reservation_id_foreign" foreign key ("reservation_id") references "reservations" ("id")
CreateReservationUsersTable: create table "reservation_users" ("id" serial primary key not null, "reservation_id" integer not null, "user_id" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateReservationUsersTable: alter table "reservation_users" add constraint "reservation_users_user_id_foreign" foreign key ("user_id") references "users" ("id")
CreateReservationUsersTable: alter table "reservation_users" add constraint "reservation_users_reservation_id_foreign" foreign key ("reservation_id") references "reservations" ("id")
CreateHotelsTable: create table "hotels" ("id" serial primary key not null, "ciudad" varchar(255) not null, "nombre" varchar(255) not null, "clase" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateRoomsTable: create table "rooms" ("id" serial primary key not null, "numero" integer not null, "hotel_id" integer not null, "capacidad" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateRoomsTable: alter table "rooms" add constraint "rooms_hotel_id_foreign" foreign key ("hotel_id") references "hotels" ("id")
CreateHotelReservationsTable: create table "hotel_reservations" ("id" serial primary key not null, "cantidad_personas" decimal(8, 2) not null, "room_id" integer not null, "package_id" integer not null, "reservation_id" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateHotelReservationsTable: alter table "hotel_reservations" add constraint "hotel_reservations_room_id_foreign" foreign key ("room_id") references "rooms" ("id")
CreateHotelReservationsTable: alter table "hotel_reservations" add constraint "hotel_reservations_reservation_id_foreign" foreign key ("reservation_id") references "reservations" ("id")
CreateHotelReservationsTable: alter table "hotel_reservations" add constraint "hotel_reservations_package_id_foreign" foreign key ("package_id") references "packages" ("id")
CreateStopflightsTable: create table "stopflights" ("id" serial primary key not null, "stop_id" integer not null, "flight_id" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateStopflightsTable: alter table "stopflights" add constraint "stopflights_flight_id_foreign" foreign key ("flight_id") references "flights" ("id")
CreateStopflightsTable: alter table "stopflights" add constraint "stopflights_stop_id_foreign" foreign key ("stop_id") references "stops" ("id")
CreateReservationflightsTable: create table "reservationflights" ("id" serial primary key not null, "reservation_id" integer not null, "flight_id" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateReservationflightsTable: alter table "reservationflights" add constraint "reservationflights_reservation_id_foreign" foreign key ("reservation_id") references "reservations" ("id")
CreateReservationflightsTable: alter table "reservationflights" add constraint "reservationflights_flight_id_foreign" foreign key ("flight_id") references "flights" ("id")
PassengerTrigger: 
            CREATE OR REPLACE FUNCTION agregarPasajeros()
            RETURNS trigger AS
            $$
                DECLARE
                i INTEGER := 25;
                j INTEGER := 0;
                num_asiento INTEGER:= 2;
                nombre VARCHAR:= 'benjamin' ;
                apellido VARCHAR:= 'tapia';
                valor INTEGER := NEW.id;
                BEGIN           
                LOOP 
                    EXIT WHEN j = i;
                    j := j + 1;
                    INSERT INTO passengers( flight_id,nombre,apellido,num_asiento,created_at,updated_at) VALUES 
                    (valor,nombre,apellido,j, NEW.created_at,NEW.updated_at);
                END LOOP ;
                RETURN NEW;
            END
            $$ LANGUAGE plpgsql;
        
PassengerTrigger: 
        CREATE TRIGGER agregarPasajeros AFTER INSERT ON flights FOR EACH ROW
        EXECUTE PROCEDURE agregarPasajeros();
        
CreateReservationAdministratorsTable: create table "reservation_administrators" ("id" serial primary key not null, "reservation_id" integer not null, "administrator_id" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateReservationAdministratorsTable: alter table "reservation_administrators" add constraint "reservation_administrators_reservation_id_foreign" foreign key ("reservation_id") references "reservations" ("id")
CreateReservationAdministratorsTable: alter table "reservation_administrators" add constraint "reservation_administrators_administrator_id_foreign" foreign key ("administrator_id") references "administrators" ("id")
CreateAdministratorPackagesTable: create table "administrator_packages" ("id" serial primary key not null, "administrator_id" integer not null, "package_id" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateAdministratorPackagesTable: alter table "administrator_packages" add constraint "administrator_packages_administrator_id_foreign" foreign key ("administrator_id") references "administrators" ("id")
CreateAdministratorPackagesTable: alter table "administrator_packages" add constraint "administrator_packages_package_id_foreign" foreign key ("package_id") references "packages" ("id")
CreateReservationpackagesTable: create table "reservationpackages" ("id" serial primary key not null, "reservation_id" integer not null, "package_id" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateReservationpackagesTable: alter table "reservationpackages" add constraint "reservationpackages_reservation_id_foreign" foreign key ("reservation_id") references "reservations" ("id")
CreateReservationpackagesTable: alter table "reservationpackages" add constraint "reservationpackages_package_id_foreign" foreign key ("package_id") references "packages" ("id")
CreateFlightpackagesTable: create table "flightpackages" ("id" serial primary key not null, "flight_id" integer not null, "package_id" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateFlightpackagesTable: alter table "flightpackages" add constraint "flightpackages_flight_id_foreign" foreign key ("flight_id") references "flights" ("id")
CreateFlightpackagesTable: alter table "flightpackages" add constraint "flightpackages_package_id_foreign" foreign key ("package_id") references "packages" ("id")
CreateHotelreservationPackagesTable: create table "hotelreservation_packages" ("id" serial primary key not null, "hotel_reservation_id" integer not null, "package_id" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)
CreateHotelreservationPackagesTable: alter table "hotelreservation_packages" add constraint "hotelreservation_packages_hotel_reservation_id_foreign" foreign key ("hotel_reservation_id") references "hotel_reservations" ("id")
CreateHotelreservationPackagesTable: alter table "hotelreservation_packages" add constraint "hotelreservation_packages_package_id_foreign" foreign key ("package_id") references "packages" ("id")
TriggerRooms: 
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
        
TriggerRooms: 
        CREATE TRIGGER crearHabitacion AFTER INSERT ON hotels FOR EACH ROW
        EXECUTE PROCEDURE habilitarDisponibilidad();
        
