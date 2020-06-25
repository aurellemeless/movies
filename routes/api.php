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

// movies
Route::post('/movies','Api\MovieController@store');
Route::put('/movies/{id}','Api\MovieController@update');
Route::delete('/movies/{id}','Api\MovieController@delete');
Route::get('/movies','Api\MovieController@index');
Route::get('/movies/search','Api\MovieController@search');
Route::get('/movies/{id}','Api\MovieController@read');

// countries
Route::post('/countries','Api\CountryController@store');
Route::put('/countries/{id}','Api\CountryController@update');
Route::delete('/countries/{id}','Api\CountryController@delete');
Route::get('/countries','Api\CountryController@index');

// Gender
Route::post('/genders','Api\GenderController@store');
Route::put('/genders/{id}','Api\GenderController@update');
Route::delete('/genders/{id}','Api\GenderController@delete');
Route::get('/genders','Api\GenderController@index');