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

});