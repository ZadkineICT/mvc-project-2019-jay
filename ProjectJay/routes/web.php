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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

Route::get ( '/search', function () {
    return view ( 'search' );
} );

Route::any ( '/search', function () {
    $q = Input::get('q');
    $hotels = Hotel::where ( 'name_hotel', 'LIKE', '%' . $q . '%' )->orWhere ( 'country', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $hotels ) > 0)
        return view ( 'search' , compact('hotels'))->withQuery ( $q );
    else
        return view ( 'search' , compact('hotels'))->withQuery ( $q )->with('message', 'Cannot find hotels');
} );

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

Route::group(['middleware' => ['role:owner|admin']], function () {
    Route::resource('/favorites', 'FavoritesController');
});

Route::group(['middleware' => ['role:client']], function () {
    Route::get('/reservationuserShow', 'HomeController@indexReservations')->name('reservationUserShow');
    Route::delete('/reservationuserShow/{reservation}/delete', 'HomeController@destroyReservations')->name('reservationUserDestroy');
    Route::get('/reservationuserShow/{reservation}', 'HomeController@deleteReservations')->name('reservationUserDelete');
});

Route::group(['middleware' => ['role:client']], function () {
    Route::get('/reviewuserShow', 'HomeController@indexReviews')->name('reviewUserShow');
    Route::delete('/reviewuserShow/{review}/delete', 'HomeController@destroyReviews')->name('reviewUserDestroy');
    Route::get('/reviewuserShow/{review}', 'HomeController@deleteReviews')->name('reviewUserDelete');
});

Route::group(['middleware' => ['role:client']], function () {
    Route::get('/favoriteuserShow', 'HomeController@indexFavorites')->name('favoriteUserShow');
    Route::delete('/hotels/{hotel}/delete', 'FavoritesController@destroy')->name('favoriteUserDestroy');
    Route::post('/hotels/{hotel}', 'FavoritesController@store')->name('favoriteUserStore');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/hotels/{hotel}', 'HotelsController@show')->name('hotels.show');
Route::get('/reservations/create', 'ReservationsController@create')->name('reservations.create');
Route::post('/reservations', 'ReservationsController@store');
Route::get('/reviews/create', 'ReviewsController@create')->name('reviews.create');
Route::post('/reviews', 'ReviewsController@store');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

