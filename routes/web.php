<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Use command line to crate routes.
|
*/

Route::middleware(['locale'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::post('/set-locale', 'Front\LocalesController@setLocale')->name('locales.set-locale');
    Route::get('/test-test', 'Front\TestsController@testTest')->name('test.route');
});