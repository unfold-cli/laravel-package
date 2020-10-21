<?php

use StubVendor\StubPackage\Http\Controllers\StubPackageController;
use \StubVendor\StubPackage\Http\Controllers\Api\StubPackageController as ApiController;

Route::group(['middleware' => 'auth', 'as' => 'stub-vendor.stub-package.'], function ($router) {
    Route::resource('stub-package', StubPackageController::class);
});

Route::group(['middleware' => 'auth:api', 'as' => 'stub-vendor.stub-package.api.', 'prefix' => 'api'], function ($router) {
    Route::post('/stub-packages/action', ApiController::class."@action")->name('action');
    Route::put('/stub-packages/{stub_package?}}', ApiController::class."@update")->name('update');
    Route::apiResource('stub-packages', ApiController::class)->except(['update']);
});
