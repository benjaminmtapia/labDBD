-- convert Laravel migrations to raw SQL scripts --

-- migration:2014_10_12_000000_create_users_table --
create table "users" (
  "id" serial primary key not null, 
  "name" varchar(255) not null, 
  "email" varchar(255) not null, 
  "email_verified_at" timestamp(0) without time zone null, 
  "password" varchar(255) not null, 
  "remember_token" varchar(100) null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);
alter table 
  "users" 
add 
  constraint "users_email_unique" unique ("email");

-- migration:2014_10_12_100000_create_password_resets_table --
create table "password_resets" (
  "email" varchar(255) not null, 
  "token" varchar(255) not null, 
  "created_at" timestamp(0) without time zone null
);
create index "password_resets_email_index" on "password_resets" ("email");

-- migration:2018_10_18_034244_create_packages_table --
create table "packages" (
  "id" serial primary key not null, 
  "descuento" integer not null, 
  "fecha_vencimiento" timestamp(0) without time zone not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);

-- migration:2018_11_14_193626_create_destinies_table --
create table "destinies" (
  "id" serial primary key not null, 
  "ciudad" varchar(60) not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);

-- migration:2018_11_16_023632_create_origins_table --
create table "origins" (
  "id" serial primary key not null, 
  "ciudad" varchar(60) not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);

-- migration:2018_11_18_125516_create_reservations_table --
create table "reservations" (
  "id" serial primary key not null, 
  "monto" integer not null, 
  "num_pasaporte" integer not null, 
  "num_reserva_hotel" integer not null, 
  "origin_id" integer not null, 
  "destiny_id" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);
alter table 
  "reservations" 
add 
  constraint "reservations_destiny_id_foreign" foreign key ("destiny_id") references "destinies" ("id");
alter table 
  "reservations" 
add 
  constraint "reservations_origin_id_foreign" foreign key ("origin_id") references "origins" ("id");

-- migration:2018_12_14_193213_create_airports_table --
create table "airports" (
  "id" serial primary key not null, 
  "ciudad" varchar(60) not null, 
  "nombre" varchar(60) not null, 
  "origin_id" integer not null, 
  "destiny_id" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);
alter table 
  "airports" 
add 
  constraint "airports_origin_id_foreign" foreign key ("origin_id") references "origins" ("id");
alter table 
  "airports" 
add 
  constraint "airports_destiny_id_foreign" foreign key ("destiny_id") references "destinies" ("id");

-- migration:2018_12_14_194012_create_passengers_table --
create table "passengers" (
  "id" serial primary key not null, 
  "nombre" varchar(255) not null, 
  "apellido" varchar(255) not null, 
  "num_asiento" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);

-- migration:2018_12_16_023424_create_socios_table --
create table "socios" (
  "id" serial primary key not null, 
  "numero" integer not null, 
  "email" varchar(255) not null, 
  "millas" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);

-- migration:2018_12_18_032925_create_flights_table --
create table "flights" (
  "id" serial primary key not null, 
  "fecha_ida" date not null, 
  "capacidad" smallint not null, 
  "num_pasajeros" smallint not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);

-- migration:2018_12_18_033652_create_administrators_table --
create table "administrators" (
  "id" serial primary key not null, 
  "nombre" varchar(40) not null, 
  "apellido" varchar(40) not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);

-- migration:2018_12_18_033906_create_tickets_table --
create table "tickets" (
  "id" serial primary key not null, 
  "num_asiento" smallint not null, 
  "hora" timestamp(0) without time zone not null, 
  "origen" varchar(80) not null, 
  "destino" varchar(80) not null, 
  "doc_identificacion" varchar(40) not null, 
  "tipo_pasajero" varchar(20) not null, 
  "flight_id" integer not null, 
  "reservation_id" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);
alter table 
  "tickets" 
add 
  constraint "tickets_flight_id_foreign" foreign key ("flight_id") references "flights" ("id");
alter table 
  "tickets" 
add 
  constraint "tickets_reservation_id_foreign" foreign key ("reservation_id") references "reservations" ("id");

-- migration:2018_12_18_034126_create_cars_table --
create table "cars" (
  "id" serial primary key not null, 
  "patente" varchar(255) not null, 
  "marca" varchar(255) not null, 
  "modelo" varchar(255) not null, 
  "capacidad" decimal(8, 2) not null, 
  "package_id" integer not null, 
  "reservation_id" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);
alter table 
  "cars" 
add 
  constraint "cars_package_id_foreign" foreign key ("package_id") references "packages" ("id");
alter table 
  "cars" 
add 
  constraint "cars_reservation_id_foreign" foreign key ("reservation_id") references "reservations" ("id");

-- migration:2018_12_18_034431_create_rooms_table --
create table "rooms" (
  "id" serial primary key not null, 
  "numero" integer not null, 
  "capacidad" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);

-- migration:2018_12_18_034432_create_hotel_reservations_table --
create table "hotel_reservations" (
  "id" serial primary key not null, 
  "cantidad_personas" decimal(8, 2) not null, 
  "room_id" integer not null, 
  "package_id" integer not null, 
  "reservation_id" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);
alter table 
  "hotel_reservations" 
add 
  constraint "hotel_reservations_room_id_foreign" foreign key ("room_id") references "rooms" ("id");
alter table 
  "hotel_reservations" 
add 
  constraint "hotel_reservations_package_id_foreign" foreign key ("package_id") references "packages" ("id");
alter table 
  "hotel_reservations" 
add 
  constraint "hotel_reservations_reservation_id_foreign" foreign key ("reservation_id") references "reservations" ("id");

-- migration:2018_12_18_034551_create_check_ins_table --
create table "check_ins" (
  "id" serial primary key not null, 
  "cuenta" integer not null, 
  "num_vuelo" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);

-- migration:2018_12_18_034839_create_purchases_table --
create table "purchases" (
  "id" serial primary key not null, 
  "fecha" timestamp(0) without time zone not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);

-- migration:2018_12_19_193842_create_stops_table --
create table "stops" (
  "id" serial primary key not null, 
  "nombre" varchar(60) not null, 
  "flight_id" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);
alter table 
  "stops" 
add 
  constraint "stops_flight_id_foreign" foreign key ("flight_id") references "flights" ("id");

-- migration:2018_12_20_030746_create_reservation-packages_table --
create table "reservation-packages" (
  "package_id" integer not null, "reservation_id" integer not null
);
alter table 
  "reservation-packages" 
add 
  constraint "reservation_packages_package_id_foreign" foreign key ("package_id") references "packages" ("id");
alter table 
  "reservation-packages" 
add 
  constraint "reservation_packages_reservation_id_foreign" foreign key ("reservation_id") references "reservations" ("id");

-- migration:2018_12_20_031009_create_hotel_reservation-packages_table --
create table "hotel_reservation-packages" (
  "id" serial primary key not null, "package_id" integer not null, 
  "hotel_reservations_id" integer not null
);
alter table 
  "hotel_reservation-packages" 
add 
  constraint "hotel_reservation_packages_package_id_foreign" foreign key ("package_id") references "packages" ("id");
alter table 
  "hotel_reservation-packages" 
add 
  constraint "hotel_reservation_packages_hotel_reservations_id_foreign" foreign key ("hotel_reservations_id") references "hotel_reservations" ("id");

-- migration:2018_12_20_224528_create_reservation_users_table --
create table "reservation_users" (
  "id" serial primary key not null, 
  "reservation_id" integer not null, 
  "user_id" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);
alter table 
  "reservation_users" 
add 
  constraint "reservation_users_user_id_foreign" foreign key ("user_id") references "users" ("id");
alter table 
  "reservation_users" 
add 
  constraint "reservation_users_reservation_id_foreign" foreign key ("reservation_id") references "reservations" ("id");

-- migration:2018_12_25_001853_create_hotels_table --
create table "hotels" (
  "id" serial primary key not null, 
  "ciudad" varchar(255) not null, 
  "nombre" varchar(255) not null, 
  "clase" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);

-- migration:2018_12_25_002731_create_flightpackages_table --
create table "flightpackages" (
  "flight_id" integer not null, 
  "package_id" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);
alter table 
  "flightpackages" 
add 
  constraint "flightpackages_flight_id_foreign" foreign key ("flight_id") references "flights" ("id");
alter table 
  "flightpackages" 
add 
  constraint "flightpackages_package_id_foreign" foreign key ("package_id") references "packages" ("id");

-- migration:2018_12_25_002802_create_stopflights_table --
create table "stopflights" (
  "stop_id" integer not null, 
  "flight_id" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);
alter table 
  "stopflights" 
add 
  constraint "stopflights_flight_id_foreign" foreign key ("flight_id") references "flights" ("id");
alter table 
  "stopflights" 
add 
  constraint "stopflights_stop_id_foreign" foreign key ("stop_id") references "stops" ("id");

-- migration:2018_12_25_002835_create_administratorpackages_table --
create table "administratorpackages" (
  "administrator_id" integer not null, 
  "package_id" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);
alter table 
  "administratorpackages" 
add 
  constraint "administratorpackages_package_id_foreign" foreign key ("package_id") references "packages" ("id");
alter table 
  "administratorpackages" 
add 
  constraint "administratorpackages_administrator_id_foreign" foreign key ("administrator_id") references "administrators" ("id");

-- migration:2018_12_25_002851_create_reservationflights_table --
create table "reservationflights" (
  "reservation_id" integer not null, 
  "flight_id" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);
alter table 
  "reservationflights" 
add 
  constraint "reservationflights_reservation_id_foreign" foreign key ("reservation_id") references "reservations" ("id");
alter table 
  "reservationflights" 
add 
  constraint "reservationflights_flight_id_foreign" foreign key ("flight_id") references "flights" ("id");

-- migration:2018_12_25_003013_create_reservationadministrators_table --
create table "reservationadministrators" (
  "reservation_id" integer not null, 
  "administrator_id" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);
alter table 
  "reservationadministrators" 
add 
  constraint "reservationadministrators_reservation_id_foreign" foreign key ("reservation_id") references "reservations" ("id");
alter table 
  "reservationadministrators" 
add 
  constraint "reservationadministrators_administrator_id_foreign" foreign key ("administrator_id") references "administrators" ("id");

-- migration:2018_12_25_004844_create_clientreservations_table --
create table "clientreservations" (
  "user_id" integer not null, 
  "reservation_id" integer not null, 
  "created_at" timestamp(0) without time zone null, 
  "updated_at" timestamp(0) without time zone null
);
alter table 
  "clientreservations" 
add 
  constraint "clientreservations_user_id_foreign" foreign key ("user_id") references "users" ("id");
alter table 
  "clientreservations" 
add 
  constraint "clientreservations_reservation_id_foreign" foreign key ("reservation_id") references "reservations" ("id");
