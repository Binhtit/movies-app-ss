<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/**
 * Admin routes
 */

$moduleRoute = '/admin';

Route::group(['prefix' => $moduleRoute], function (Router $router) {
    Route::get('/login', 'AdminController@index');
    Route::post('/dashboard', 'AdminController@show_dashboard');
});
