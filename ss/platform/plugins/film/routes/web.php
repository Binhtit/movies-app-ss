<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/**
 * Admin routes
 */

$moduleRoute = 'film';

Route::group(['prefix' => $moduleRoute], function (Router $router) {
    $router->resource('', 'FilmController');
});