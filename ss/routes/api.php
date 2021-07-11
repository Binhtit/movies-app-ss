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

# 20 newest film
Route::get('top20newest', 'Api\HomeController@get20NewestFilm');

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

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::post('/login', 'Api\APIController@login');
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'Api\APIController@logout');
    Route::get('users', 'Api\APIController@index');
});




