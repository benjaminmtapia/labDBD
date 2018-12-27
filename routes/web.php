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
    return view('welcome');
});

Auth::routes();

Route::resource('/airports', 'AirportController');
Route::resource('/administrators', 'AdministratorController');
Route::resource('/flights', 'FlightController');
Route::resource('/tickets', 'TicketController');
Route::resource('/cars', 'CarController');
Route::resource('/check_ins', 'CheckInController');
Route::resource('/hotels', 'HotelController');
Route::resource('/packages', 'PackageController');
Route::resource('/rooms', 'RoomController');
Route::resource('/hotel_reservations', 'HotelReservationController');
Route::resource('/purchases', 'PurchaseController');
Route::resource('/users', 'UserController');
Route::resource('/destinies', 'DestinyController');
Route::resource('/origins','OriginController');
Route::resource('/passengers','PassengerController');
Route::resource('/reservations','ReservationController');
Route::resource('/socios','SocioController');
Route::resource('/stops','StopController');