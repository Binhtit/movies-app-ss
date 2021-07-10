<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('films', 'Api\FilmController');
Route::get('films/{id}/episodes', 'Api\FilmController@getAllEpisodeByID');
Route::get('films/newest/{amount}', 'Api\FilmController@getNewestFilm');

Route::apiResource('film_categories', 'Api\FilmCategoryController');
Route::apiResource('menus', 'Api\MenuController');
Route::apiResource('types', 'Api\TypeController');
Route::apiResource('countries', 'Api\CountryController');
Route::apiResource('episodes', 'Api\EpisodeController');
Route::apiResource('banners', 'Api\BannerController');
Route::apiResource('ads', 'Api\AdController');
Route::apiResource('configurations', 'Api\ConfigurationController');
// Route::apiResource('users', 'Api\UserController');
Route::apiResource('admins', 'Api\AdminController');
Route::apiResource('password_resets', 'Api\PasswordResetController');


Route::post('login', 'Api\APIController@login');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'Api\APIController@logout');
    Route::get('users', 'Api\UserController@index');

    # home page
    Route::get('home', 'Api\HomeController@getHomePage');

    # Phim 2D, phim 3D
    Route::get('movies/{id}', 'Api\FilmCategoryController@getAllFilm');

    # Detail 
    Route::get('movies/detail/{id}', 'Api\FilmController@getDetail');

    # tập film
    Route::get('movies/detail/episodes/{id}', 'Api\FilmController@getAllEpisodeByID');

    # xem phim
    Route::get('movies/detail/episodes/play/{id}', 'Api\EpisodeController@getDetailEp');
});


