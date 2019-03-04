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

Route::get('/autos/crear', 'CarController@create');
Route::get('cars/{id}/edit', 'CarController@edit');
Route::put('cars/{car}', 'CarController@update');

Route::post('/vuelos/busqueda','FlightController@buscar');
Route::post('/asiento/pasajero','FlightController@inscribirPasajero');
Route::post('/asiento/reserva','PassengerController@reservarAsiento');
Route::post('/vuelos/asientos','FlightController@verAsientos');

Route::post('/seguros/reserva', 'SecureController@reservarSeguro');
Route::post('/vuelos/busquedaporfecha','FlightController@buscarporfecha');
Route::post('/vuelos/verdetalle','FlightController@verDetalle');

Route::post('/paquetes/reserva','PackageController@reservarPaquete');

Route::post('/hoteles/ciudad','HotelController@verHoteles');
Route::post('/hoteles/habitaciones','HotelController@verHabitaciones');
Route::post('/hoteles/reservar','RoomController@reservarHabitacion');
Route::post('/hoteles/buscar','HotelController@buscarHotel');

Route::post('/autos/reserva','CarController@reservarAuto');
Route::post('/autos/busqueda','CarController@buscarAuto');


Route::get('/email', 'MailController@home');
Route::post('/email_send', 'MailController@sendMail');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth','admin']],function(){
	Route::get('/admin',function(){
		return view('admin');
	});
});
