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

// Route::get('/hotel', function () {
//     return view('hotel.index');
// });
Route::group(['middleware' => ['role:owner|admin|client']], function (){
    Route::get('/hotels/{hotel}/delete', 'HotelsController@delete')->name('hotels.delete');
    Route::resource('/hotels', 'HotelsController');
});

Route::group(['middleware' => ['role:owner|admin']], function () {
    Route::get('/rooms/{room}/delete', 'RoomsController@delete')->name('rooms.delete');
    Route::resource('/rooms', 'RoomsController');
});

Route::group(['middleware' => ['role:owner|admin']], function () {
    Route::get('/reservations/{reservation}/delete', 'ReservationsController@delete')->name('reservations.delete');
    Route::resource('/reservations', 'ReservationsController');
});

Route::group(['middleware' => ['role:owner|admin']], function () {
    Route::get('/employees/{employee}/delete', 'EmployeesController@delete')->name('employees.delete');
    Route::resource('/employees', 'EmployeesController');
});

Route::group(['middleware' => ['role:owner|admin']], function () {
    Route::get('/roomtypes/{roomtype}/delete', 'RoomtypesController@delete')->name('roomtypes.delete');
    Route::resource('/roomtypes', 'RoomtypesController');
});

use App\Hotel;

Route::get('/frontpage', function () {
    $hotels = Hotel::all();
    return view('frontpage', compact('hotels'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
