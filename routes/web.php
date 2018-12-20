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

Route::resource('/airports/', 'AirportController');
Route::resource('/destinies/', 'DestinyController');
Route::resource('/origins/','OriginController');
Route::resource('/passengers/','PassengerController');
Route::resource('/reservations/','ReservationController');
Route::resource('/socios/','SocioController');
Route::resource('/stops/','StopsController');


Route::get('/airports', 'AirportController@index');
Route::post('/airports', 'AirportController@store');
Route::get('/airports/{airport}', 'AirportController@show');
