<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'auth'],function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\AuthController@register');
    Route::post('forget-password', 'Api\AuthController@forget_password');
    Route::get('verify/{code}', 'Api\AuthController@verify');
    Route::get('check-reset-code/{code}', 'Api\AuthController@check_reset_code');
    Route::post('reset-password/{code}', 'Api\AuthController@reset_password');
});

Route::group(['prefix' => 'auth', 'middleware'=>["jwt"]],function () {
    Route::get('me', 'Api\AuthController@me');
    Route::get('logout', 'Api\AuthController@logout');
});

Route::group(['prefix' => 'v1/companies', 'middleware'=>["jwt"]],function () {
    Route::get('/list', 'Api\V1\CompanyController@list');
    Route::get('/', 'Api\V1\CompanyController@index');
    Route::post('/', 'Api\V1\CompanyController@store');
    Route::put('/favourite/{id}', 'Api\V1\CompanyController@update_favourite');
});
