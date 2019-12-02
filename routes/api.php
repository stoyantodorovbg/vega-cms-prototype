<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix(app()->getLocale())->middleware(['locale'])->group(function () {
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/admin/index', 'Api\Admin\IndexController@data')->name('api-admin.index')->middleware('admins');
    Route::delete('/admin/destroy', 'Api\Admin\DeleteController@destroy')->name('api-admin.destroy')->middleware('admins');
});