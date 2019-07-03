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

Route::post('/set-locale', 'LocaleController@setLocale')->name('locales.set-locale');