<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();


Route::resource('/airports', 'AirportController');
Route::resource('/flights', 'FlightController');
Route::resource('/tickets', 'TicketController');
Route::resource('/cars', 'CarController');
Route::resource('/check_ins', 'CheckInController');
Route::resource('/hotels', 'HotelController');
Route::resource('/packages', 'PackageController');
Route::resource('/rooms', 'RoomController');
Route::resource('/purchases', 'PurchaseController');
Route::resource('/users', 'UserController');
Route::resource('/destinies', 'DestinyController');
Route::resource('/origins','OriginController');
Route::resource('/passengers','PassengerController');
Route::resource('/reservations','ReservationController');
Route::resource('/stops','StopController');
Route::resource('/stopflights','StopflightController');
Route::resource('/reservation_users','ReservationUserController');
Route::resource('/seats', 'SeatController');
Route::resource('/secures', 'SecureController');

Route::resource('/carrito', 'CarritoController');
Route::get('/carrito/{id}','CarritoController@show');
Route::get('/log', 'UserController@mostrarHistorial');

Route::get('/autos/crear', 'CarController@create');
Route::get('cars/{id}/edit', 'CarController@edit');
Route::put('cars/{car}', 'CarController@update');

Route::post('/vuelos/busqueda','FlightController@buscar');
Route::post('/asiento/pasajero','FlightController@inscribirPasajero');
Route::post('/asiento/reserva','PassengerController@reservarAsiento');
Route::post('/vuelos/asientos','FlightController@verAsientos');
Route::get('vuelos/crear', 'FlightController@create');
Route::get('/flights/{id}/edit', 'FlightController@edit');
Route::put('/flights/{flight}', 'FlightController@update');

Route::post('/seguro/reserva', 'SecureController@reservarSeguro');
Route::post('/seguros/pasajero', 'SecureController@gotoForm');
Route::post('/vuelos/busquedaporfecha','FlightController@buscarporfecha');
Route::post('/vuelos/verdetalle','FlightController@verDetalle');

Route::post('/paqueteauto/reserva','PackageController@reservarPaqueteAuto');
Route::post('/paquetehotel/reserva','PackageController@reservarPaqueteHotel');
Route::post('/paquetes/asientos','PackageController@verAsientoAuto');
Route::post('/paqueteauto/verdetalle','PackageController@verDetalleAuto');
Route::post('/paquete/pasajero','PackageController@gotoFormAuto');
Route::post('/paquetehotel/pasajero','PackageController@gotoFormHotel');
Route::post('/paquetes/agregarasiento','PackageController@agregarAsiento');
Route::post('/paquetes/habitaciones','PackageController@verHoteles');
Route::post('/paquetes/rooms','PackageController@verHabitaciones');
Route::post('/paquetes/reservahabitacion','PackageController@reservarHabitacion');

Route::post('/paquetes/reserva','PackageController@reservarPaquete');
Route::post('/paquetehotel/asientos','PackageController@verAsientoHotel');
Route::post('/paquetehotel/verdetalle','PackageController@verDetalleHotel');
//Route::post('/paquetes/pasajero','PackageController@gotoForm');
Route::post('/paqueteauto/agregarasiento','PackageController@agregarAsientoAuto');
Route::post('/paquetes/habitaciones','PackageController@verHoteles');
Route::post('/paquetes/rooms','PackageController@verHabitaciones');
Route::post('/paquetes/reservahabitacion','PackageController@reservarHabitacion');



Route::post('/hoteles/ciudad','HotelController@verHoteles');
Route::post('/hoteles/habitaciones','HotelController@verHabitaciones');
Route::post('/hoteles/reservar','RoomController@reservarHabitacion');
Route::post('/hoteles/buscar','HotelController@buscarHotel');
Route::get('/hoteles/crear', 'HotelController@create');
Route::get('/hotels/{id}/edit', 'HotelController@edit');
Route::put('/hotels/{hotel}', 'HotelController@update');

Route::post('/autos/reserva','CarController@reservarAuto');
Route::post('/autos/busqueda','CarController@buscarAuto');

Route::post('/checkin','HomeController@gotocheckin');
Route::post('/checkin/datos','CheckInController@realizarCheckin');
Route::post('/checkin/submit','CheckInController@finalizarCheckin');

Route::get('/email', 'MailController@home');
Route::get('/email_send/{id}', 'MailController@sendMail');

Route::post('/asientos/eliminar_reserva', 'PassengerController@quitarDelCarrito');
Route::post('/autos/eliminar_reserva', 'CarController@quitarDelCarrito');
Route::post('/habitaciones/eliminar_reserva', 'RoomController@quitarDelCarrito');
Route::post('/seguros/eliminar_reserva', 'SecureController@quitarDelCarrito');

Route::post('/confirmar_compra/{id}', 'CarritoController@confirmarCompra');
Route::post('/ejecutar_compra/{id}', 'PurchaseController@store');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth','admin']],function(){
	Route::get('/admin',function(){
		return view('admin');
	});
});
