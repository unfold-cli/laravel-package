<?php

use StubVendor\StubPackage\Http\Controllers\Api\StubPackageController;

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

Route::group(['middleware' => 'auth:api', 'as' => 'api.', 'prefix' => 'api'], function ($router) {
    Route::post('/stub-packages/action', StubPackageController::class."@action");
    Route::apiResource('stub-packages', StubPackageController::class);
});
