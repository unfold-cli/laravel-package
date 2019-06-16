<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use StubVendor\StubPackage\Http\Controllers\StubPackageController;

Route::group(['middleware' => 'auth'], function ($router) {
    Route::resource('stub-packages', StubPackageController::class);
});
