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



Route::group(['middleware'=>'auth:sanctum'], function () {
    Route::post('/dashboard','App\Http\Controllers\Api\DashboardController@index');
    //get all dealers
    Route::post('dealers','App\Http\Controllers\Api\DashboardController@getDealers');
    //get all vehicles
    Route::post('vehicles','App\Http\Controllers\Api\DashboardController@getVehicles');

    //get all services
    Route::post('services','App\Http\Controllers\Api\DashboardController@getServices');
    //get all spareparts
    Route::post('spare-parts','App\Http\Controllers\Api\DashboardController@getSpareParts');

    //get all orders
    Route::post('list-order','App\Http\Controllers\SuperAdmin\OrderController@getAllOrders');
    //create order
    Route::post('create-order','App\Http\Controllers\SuperAdmin\OrderController@createOrder');
    //cancel order
    Route::post('cancel-order','App\Http\Controllers\SuperAdmin\OrderController@cancelOrder');
    //request for approve order
    Route::post('approve-order','App\Http\Controllers\SuperAdmin\OrderController@approveOrder');

});
