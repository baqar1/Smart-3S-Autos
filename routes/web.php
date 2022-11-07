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
    Route::get('/dealer-list','App\Http\Controllers\SuperAdmin\DealersController@dealerList')->name('dealer.list');
    //active or deactive dealers
    Route::get('/dealer-status','App\Http\Controllers\SuperAdmin\DealersController@dealerStatus')->name('dealer.status');
    //edit dealer
    Route::get('/dealer-edit/{dealer}','App\Http\Controllers\SuperAdmin\DealersController@dealerEdit')->name('dealer.edit');
    //update dealer
    Route::post('/dealer-update{dealer}','App\Http\Controllers\SuperAdmin\DealersController@dealerUpdate')->name('dealer.update');
   //add dealer
   Route::get('/dealer-add','App\Http\Controllers\SuperAdmin\DealersController@dealerAdd')->name('dealer.add');
   //store dealer
   Route::post('/dealer-store','App\Http\Controllers\SuperAdmin\DealersController@dealerStore')->name('dealer.store'); 
   //spareparts crud

   //spareparts list
   Route::get('/spare-parts-list','App\Http\Controllers\SuperAdmin\SparePartsController@sparePartsList')->name('spare.parts.list');

   //spare parts create or edit
   Route::get('/spare-parts-view/{spare?}','App\Http\Controllers\SuperAdmin\SparePartsController@sparePartsView')->name('spare.parts.view');
  
   //spareparts store and update
   Route::post('/spare-parts-store','App\Http\Controllers\SuperAdmin\SparePartsController@sparePartsStore')->name('spare.parts.store');

   //spare parts delete
   Route::post('/spare-parts-delete/{spare}','App\Http\Controllers\SuperAdmin\SparePartsController@sparePartsDelete')->name('spare.parts.delete');


});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
