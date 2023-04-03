<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['cors']], function () {
    Route::group(['prefix' => 'hoteles'], function () {
        Route::get('/', 'Api\HotelController@index');
        Route::post('/save', 'Api\HotelController@store');
        Route::get('/show/{id}', 'Api\HotelController@show');
        Route::put('/update/{id}', 'Api\HotelController@update');
        Route::delete('/delete/{id}', 'Api\HotelController@destroy');
    });

    Route::group(['prefix' => 'habitaciones'], function () {
        Route::get('/{hotel_id}', 'Api\HabitacionesHotelController@index');
        Route::post('/save/{id}', 'Api\HabitacionesHotelController@store');
        Route::get('/show/{id}', 'Api\HabitacionesHotelController@show');
        Route::put('/update/{id}', 'Api\HabitacionesHotelController@update');
        Route::delete('/delete/{id}', 'Api\HabitacionesHotelController@destroy');
    });

    Route::group(['prefix' => 'selects'], function () {
        Route::get('/selectCiudad', 'Api\HotelController@getCiudades');
        Route::get('/selectTipoHabitaciones', 'Api\HabitacionesHotelController@getTipoHabitaciones');
        Route::get('/selectAcomodaciones/{id}', 'Api\HabitacionesHotelController@getAcomodaciones');
    });
});
