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

    Route::get('/dashboard', 'Admin\DashboardsController@index')->name('admin-dashboards.index')->middleware('admins');
    Route::get('/groups', 'Admin\GroupsController@index')->name('admin-groups.index')->middleware('admins');
    Route::get('/users', 'Admin\UsersController@index')->name('admin-users.index')->middleware('admins');
    Route::get('/phrases', 'Admin\PhrasesController@index')->name('admin-phrases.index')->middleware('admins');
    Route::get('/locales', 'Admin\LocalesController@index')->name('admin-locales.index')->middleware('admins');
    Route::get('/routes', 'Admin\RoutesController@index')->name('admin-routes.index')->middleware('admins');
});