<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
$moduleRoute = '/admin';

Route::group(['prefix' => $moduleRoute], function () {
    Route::get('/login', 'AdminController@login');
    Route::post('/dashboard', 'AdminController@dashboard');
    Route::get('logout', 'AdminController@logout');
    Route::get('users', 'UserController@index');
    // Route::resource('films', 'FilmController');
    Route::get('films/{id}/episodes', 'FilmController@getAllEpisodeByID');
    Route::get('films/newest/{amount}', 'FilmController@getNewestFilm');
    // Route::resource('film_categories', 'FilmCategoryController');
    Route::resource('menus', 'MenuController');
    // Route::resource('types', 'TypeController');
    // Route::resource('countries', 'CountryController');
    // Route::resource('episodes', 'EpisodeController');
    Route::resource('banners', 'BannerController');
    // Route::resource('ads', 'AdController');
    Route::resource('configurations', 'ConfigurationController');
    Route::resource('password_resets', 'PasswordResetController');
});



