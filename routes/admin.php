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
});