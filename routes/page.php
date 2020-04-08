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
    Route::fallback(function ($url) {
        return resolve(\App\Http\Controllers\Front\PageController::class)->page('/' . $url);
    });
});