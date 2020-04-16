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
//    Route::get('/groups/{group}/edit', 'Admin\GroupsController@edit')->name('admin-groups.edit')->middleware('admins');
//    Route::patch('/groups/{group}/update', 'Admin\GroupsController@update')->name('admin-groups.update')->middleware('admins');
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
    Route::get('/groups/{group}', 'Admin\GroupsController@show')->name('admin-groups.show')->middleware('admins');
    Route::get('/users/{user}', 'Admin\UsersController@show')->name('admin-users.show')->middleware('admins');
    Route::get('/phrases/{phrase}', 'Admin\PhrasesController@show')->name('admin-phrases.show')->middleware('admins');
    Route::get('/locales/{locale}', 'Admin\LocalesController@show')->name('admin-locales.show')->middleware('admins');
    Route::get('/routes/{route}', 'Admin\RoutesController@show')->name('admin-routes.show')->middleware('admins');
    Route::get('/menus', 'Admin\MenusController@index')->name('admin-menus.index')->middleware('admins');
    Route::get('/menus/create', 'Admin\MenusController@create')->name('admin-menus.create')->middleware('admins');
    Route::get('/menus/{menu}', 'Admin\MenusController@show')->name('admin-menus.show')->middleware('admins');
    Route::post('/menus/store', 'Admin\MenusController@store')->name('admin-menus.store')->middleware('admins');
    Route::get('/menus/{menu}/edit', 'Admin\MenusController@edit')->name('admin-menus.edit')->middleware('admins');
    Route::patch('/menus/{menu}/update', 'Admin\MenusController@update')->name('admin-menus.update')->middleware('admins');
    Route::get('/menu-items/index/{menu}/{menuItem}', 'Admin\MenuItemsController@index')->name('admin-menu-items.index')->middleware('admins');
    Route::get('/menu-items/create', 'Admin\MenuItemsController@create')->name('admin-menu-items.create')->middleware('admins');
    Route::get('/menu-items/{menuItem}', 'Admin\MenuItemsController@show')->name('admin-menu-items.show')->middleware('admins');
    Route::post('/menu-items/store', 'Admin\MenuItemsController@store')->name('admin-menu-items.store')->middleware('admins');
    Route::get('/menu-items/{menuItem}/edit', 'Admin\MenuItemsController@edit')->name('admin-menu-items.edit')->middleware('admins');
    Route::patch('/menu-items/{menuItem}/update', 'Admin\MenuItemsController@update')->name('admin-menu-items.update')->middleware('admins');
    Route::get('/pages', 'Admin\PagesController@index')->name('admin-pages.index')->middleware('admins');
    Route::get('/pages/create', 'Admin\PagesController@create')->name('admin-pages.create')->middleware('admins');
    Route::get('/pages/{page}', 'Admin\PagesController@show')->name('admin-pages.show')->middleware('admins');
    Route::post('/pages/store', 'Admin\PagesController@store')->name('admin-pages.store')->middleware('admins');
    Route::get('/pages/{page}/edit', 'Admin\PagesController@edit')->name('admin-pages.edit')->middleware('admins');
    Route::patch('/pages/{page}/update', 'Admin\PagesController@update')->name('admin-pages.update')->middleware('admins');
    Route::get('/containers', 'Admin\ContainersController@index')->name('admin-containers.index')->middleware('admins');
    Route::get('/containers/create', 'Admin\ContainersController@create')->name('admin-containers.create')->middleware('admins');
    Route::get('/containers/{container}', 'Admin\ContainersController@show')->name('admin-containers.show')->middleware('admins');
    Route::post('/containers/store', 'Admin\ContainersController@store')->name('admin-containers.store')->middleware('admins');
    Route::get('/containers/{container}/edit', 'Admin\ContainersController@edit')->name('admin-containers.edit')->middleware('admins');
    Route::patch('/containers/{container}/update', 'Admin\ContainersController@update')->name('admin-containers.update')->middleware('admins');
});
