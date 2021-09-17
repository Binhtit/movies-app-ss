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

# Get 20 newest films
Route::get('top20newest', 'Api\HomeController@get20NewestFilm');

# Home page: get categories, top 5 newest films, top 40 newest eps
Route::get('home', 'Api\HomeController@getHomePage');

# Get films by category id
Route::get('movies/{id}', 'Api\FilmCategoryController@getAllFilm');

# Get detail of film by id
Route::get('movies/detail/{id}', 'Api\FilmController@getDetail');

# Get eps by film id
Route::get('movies/detail/episodes/{id}', 'Api\FilmController@getAllEpisodeByID');

# Get details of ep by id
Route::get('movies/detail/episodes/play/{id}', 'Api\EpisodeController@getDetailEp');

# Home paging 
Route::get('home_page/{category_id}/{type}/{quantity}', 'Api\FilmController@getFilmByQuantity');

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




