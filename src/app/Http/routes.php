<?php

Route::group([
    'namespace' => 'Ognestraz\Auth\Http\Controllers',
    'middleware' => ['web']
    ], function () {
        Route::get('/login', array('uses' => 'AuthController@getLogin'));
        Route::post('/login', array('uses' => 'AuthController@postLogin'));
});

Route::group([
    'namespace' => 'Ognestraz\Auth\Http\Controllers',
    'middleware' => ['web', 'admin']
    ], function () {
        Route::get('/logout', array('uses' => 'AuthController@logout'));
});
