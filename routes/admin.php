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
    Route::get('/groups/create', 'Admin\GroupsController@create')->name('admin-groups.create')->middleware('admins');
    Route::post('/groups/store', 'Admin\GroupsController@store')->name('admin-groups.store')->middleware('admins');
    Route::get('/groups/{group}/edit', 'Admin\GroupsController@edit')->name('admin-groups.edit')->middleware('admins');
    Route::patch('/groups/{group}/update', 'Admin\GroupsController@update')->name('admin-groups.update')->middleware('admins');
    Route::get('/users/create', 'Admin\UsersController@create')->name('admin-users.create')->middleware('admins');
    Route::post('/users/store', 'Admin\UsersController@store')->name('admin-users.store')->middleware('admins');
    Route::get('/users/{user}/edit', 'Admin\UsersController@edit')->name('admin-users.edit')->middleware('admins');
    Route::patch('/users/{user}/update', 'Admin\UsersController@update')->name('admin-users.update')->middleware('admins');
    Route::get('/phrases/create', 'Admin\PhrasesController@create')->name('admin-phrases.create')->middleware('admins');
    Route::post('/phrases/store', 'Admin\PhrasesController@store')->name('admin-phrases.store')->middleware('admins');
    Route::get('/phrases/{phrase}/edit', 'Admin\PhrasesController@edit')->name('admin-phrases.edit')->middleware('admins');
    Route::patch('/phrases/{phrase}/update', 'Admin\PhrasesController@update')->name('admin-phrases.update')->middleware('admins');
    Route::get('/locales/create', 'Admin\LocalesController@create')->name('admin-locales.create')->middleware('admins');
    Route::post('/locales/store', 'Admin\LocalesController@store')->name('admin-locales.store')->middleware('admins');
    Route::get('/locales/{locale}/edit', 'Admin\LocalesController@edit')->name('admin-locales.edit')->middleware('admins');
    Route::patch('/locales/{locale}/update', 'Admin\LocalesController@update')->name('admin-locales.update')->middleware('admins');
    Route::get('/routes/create', 'Admin\RoutesController@create')->name('admin-routes.create')->middleware('admins');
    Route::post('/routes/store', 'Admin\RoutesController@store')->name('admin-routes.store')->middleware('admins');
    Route::get('/routes/{route}/edit', 'Admin\RoutesController@edit')->name('admin-routes.edit')->middleware('admins');
    Route::patch('/routes/{route}/update', 'Admin\RoutesController@update')->name('admin-routes.update')->middleware('admins');
});