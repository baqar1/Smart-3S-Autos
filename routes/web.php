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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['prefix'=>'super-admin','middleware'=>'auth'],function(){
    Route::get('/dashboard','App\Http\Controllers\SuperAdmin\DahboardController@index')->name('dashboard');
    //get all dealers
    Route::get('/dealer-list','App\Http\Controllers\SuperAdmin\DealersController@dealerList')->name('dealers_list');
    //active or deactive dealers
    Route::get('/dealer-status','App\Http\Controllers\SuperAdmin\DealersController@dealerStatus')->name('dealer.status');
    //edit dealer
    Route::get('/dealer-edit/{dealer}','App\Http\Controllers\SuperAdmin\DealersController@dealerEdit')->name('dealer.edit');
    //update dealer
    Route::post('/dealer-update{dealer}','App\Http\Controllers\SuperAdmin\DealersController@dealerUpdate')->name('dealer.update');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
