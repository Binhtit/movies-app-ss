<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('film-categories', FilmCategoryController::class);
    $router->resource('films', FilmController::class);
    $router->resource('episodes', EpisodeController::class);
    $router->resource('countries', CountryController::class);
    $router->resource('ads', AdController::class);
    $router->resource('types', TypeController::class);
});
