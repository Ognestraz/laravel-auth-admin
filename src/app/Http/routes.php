<?php

Route::group([
    'namespace' => 'Ognestraz\Admin\Auth\Http\Controllers',
    'middleware' => ['web']
    ], function () {
        Route::get('/login', array('uses' => 'AuthController@getLogin'));
});

Route::group([
    'namespace' => 'Ognestraz\Admin\Auth\Http\Controllers',
    'middleware' => ['web', 'throttle:5,1']
    ], function () {
        Route::post('/login', array('uses' => 'AuthController@postLogin'));
});

Route::group([
    'namespace' => 'Ognestraz\Admin\Auth\Http\Controllers',
    'middleware' => ['web', 'admin']
    ], function () {
        Route::get('/logout', array('uses' => 'AuthController@logout'));
});
