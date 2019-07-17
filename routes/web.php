<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Use command line to crate routes.
|
*/

Route::prefix(app()->getLocale())->middleware(['locale'])->group(function () {
    Auth::routes();
    Route::get('/test-test', 'Front\TestsController@testTest')->name('test.route');
    Route::get('/welcome', 'Front\WelcomeController@index')->name('welcome');
    Route::get('/home', 'Front\HomeController@index')->name('home')->middleware('ordinaryUsers');
    Route::post('/set-locale', 'Front\LocalesController@setLocale')->name('locales.set-locale');
});
