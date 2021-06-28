<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/**
 * Admin routes
 */

$moduleRoute = 'film-management';

Route::group(['prefix' => $moduleRoute], function (Router $router) {
    $router->resource('', 'FilmController');
});

// Route::group(['prefix' => $moduleRoute], function (Router $router) {
//     $router->resource('', 'FilmController');
//     return view('film-management::index');
// });

// Route::group(['prefix' => $moduleRoute], function (Router $router) {
//     Route::get('/', function() {
//         page_title()->setTitle('film-management');

//         return view('film-management::homepage');
//     });
// });
