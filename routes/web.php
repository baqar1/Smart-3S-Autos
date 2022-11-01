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
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
