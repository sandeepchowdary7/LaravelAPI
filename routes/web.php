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

Route::get('/example', function () {
    return view('welcome');
});


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::post('/input', 'InputDataController@index')->name('input');
Route::get('/city', 'InputDataController@index');
Route::get('/cityData', 'InputDataController@getCityData')->name('cityData');
Route::get('/cityFood', 'InputDataController@getCityFood')->name('cityFood');
Route::get('/cityEvents', 'InputDataController@getEvents')->name('cityEvents');