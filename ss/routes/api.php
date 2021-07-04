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

$moduleRoute = '/admin';
Route::group(['prefix' => $moduleRoute], function () {
    Route::get('/login', 'AdminController@index');
    Route::post('/dashboard', 'AdminController@show_dashboard');
});