<?php

Route::group([
    'namespace' => 'Ognestraz\Admin\Auth\Http\Controllers',
    'middleware' => ['web']
    ], function () {
        Route::get('/login', array('uses' => 'AuthController@showLoginForm'));
});

Route::group([
    'namespace' => 'Ognestraz\Admin\Auth\Http\Controllers',
    'middleware' => ['web', 'throttle:5,1']
    ], function () {
        Route::post('/login', array('uses' => 'AuthController@login'));
});

Route::group([
    'namespace' => 'Ognestraz\Admin\Auth\Http\Controllers',
    'middleware' => ['web', 'admin']
    ], function () {
        Route::get('/logout', array('uses' => 'AuthController@logout'));
});
