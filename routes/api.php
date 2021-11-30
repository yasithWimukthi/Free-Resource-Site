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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::post('/login', 'App\Http\Controllers\Auth\ApiAuthController@login')->name('login.api');
    Route::post('/register','App\Http\Controllers\Auth\ApiAuthController@register')->name('register.api');

});

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');
    Route::get('/resource', 'App\Http\Controllers\ResourceController@index')->name('resource');
});

Route::middleware(['middleware' => ['auth:api', 'api.admin']])->group(function () {
    Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');
    Route::get('/resource', 'App\Http\Controllers\ResourceController@index')->name('resource');
});



