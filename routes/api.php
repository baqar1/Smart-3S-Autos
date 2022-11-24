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


Route::post('register-user', 'App\Http\Controllers\Api\AuthenticateController@register');
Route::post('login-user', 'App\Http\Controllers\Api\AuthenticateController@login');

//get all dealers
Route::post('dealers','App\Http\Controllers\Api\DashboardController@dealers');
//get all dealers
Route::post('services','App\Http\Controllers\Api\DashboardController@services');
//get all dealers
Route::post('spare-parts','App\Http\Controllers\Api\DashboardController@spareParts');

Route::group(['middleware'=>'auth:sanctum'], function () {
    Route::post('/dashboard','App\Http\Controllers\Api\DashboardController@index');

});
