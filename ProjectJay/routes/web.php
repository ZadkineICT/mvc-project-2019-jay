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

use App\Hotel;

Auth::routes();

Route::get('/', function () {
    $hotels = Hotel::all();
    return view('frontpage', compact('hotels'));
});

Route::get('/frontpage', function () {
    $hotels = Hotel::all();
    return view('frontpage', compact('hotels'));
});

Route::group(['middleware' => ['role:owner|admin']], function () {
    Route::get('/hotels/{hotel}/delete', 'HotelsController@delete')->name('hotels.delete');
    Route::resource('/hotels', 'HotelsController');
});

Route::group(['middleware' => ['role:owner|admin']], function () {
    Route::get('/rooms/{room}/delete', 'RoomsController@delete')->name('rooms.delete');
    Route::resource('/rooms', 'RoomsController');
});

Route::group(['middleware' => ['role:owner|admin|']], function () {
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

Route::group(['middleware' => ['role:owner|admin']], function () {
    Route::get('/reviews/{review}/delete', 'ReviewsController@delete')->name('reviews.delete');
    Route::resource('/reviews', 'ReviewsController');
});

Route::group(['middleware' => ['role:client']], function () {
    Route::get('/reservationuserShow', 'HomeController@indexReservations')->name('reservationuserShow');
    Route::get('/reservationuserShow/{reservation}/delete', 'HomeController@delete')->name('reservationuserDelete');
    Route::post('/home/{reservation}', 'HomeController@destroy')->name('home.destroy');
});

Route::group(['middleware' => ['role:client']], function () {
    Route::get('test', 'ReviewsController@create')->name('reviews.create');
    Route::resource('/reviews', 'ReviewsController');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/hotels/{hotel}', 'HotelsController@show')->name('hotels.show');
Route::get('/reservations/create', 'ReservationsController@create')->name('reservations.create');
Route::post('/reservations', 'ReservationsController@store');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/changePassword', 'HomeController@showChangePasswordForm');
Route::post('/changePassword', 'HomeController@changePassword')->name('changePassword');
