<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Use command line to crate routes.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/test1', 'TestController@test1')->name('test.test');
Route::get('/test', 'TestController@test')->name('test.test');
Route::get('/test', 'TestController@test')->name('test.test');
Route::get('/test', 'TestController@test')->name('test.test');
