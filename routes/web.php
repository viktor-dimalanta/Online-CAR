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

Route::get('/', 'LoginController@create');
Route::get('/login', 'LoginController@create');
Route::post('/login', 'LoginController@authenticate');
Route::get('/logout', 'LoginController@destroy');
//Route::post('/login', [ 'as' => 'login', 'uses' => 'LoginController@authenticate']);
Route::any('/search', 'CarController@search')->name('search');
Route::any('/search_cars', 'CarController@search_cars')->name('search_cars');
Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/cars', 'CarController@index')->name('index');
    Route::get('/cars/create', 'CarController@create');
    Route::post('/cars', 'CarController@store')->name('cars');
    Route::get('/cars/{car}', 'CarController@show');
});

Route::get('/welcome', function () {
    return view('welcome');
});
