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

use App\Hotel;

Route::get('/frontpage', function () {
    $hotels = Hotel::all();
    return view('frontpage', compact('hotels'));
});

Route::get('/hotels/{hotel}/delete', 'HotelsController@delete')->name('hotels.delete');

Route::resource('/hotels', 'HotelsController');



Route::get('/rooms/{room}/delete', 'RoomsController@delete')->name('rooms.delete');

Route::resource('/rooms', 'RoomsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
