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
Route::apiResource('film_categories', 'Api\FilmCategoryController');
Route::apiResource('menus', 'Api\MenuController');
Route::apiResource('types', 'Api\TypeController');
Route::apiResource('countries', 'Api\CountryController');
Route::apiResource('episodes', 'Api\EpisodeController');
Route::apiResource('banners', 'Api\BannerController');
Route::apiResource('ads', 'Api\AdController');
Route::apiResource('configurations', 'Api\ConfigurationController');
Route::apiResource('users', 'Api\UserController');
Route::apiResource('admins', 'Api\AdminController');
Route::apiResource('password_resets', 'Api\PasswordResetController');
