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


//super admin route
Route::group(['prefix'=>'super-admin','middleware'=>['auth','isSuperAdmin'] ],function(){
    Route::get('/dashboard','App\Http\Controllers\SuperAdmin\DahboardController@index')->name('dashboard');
    //super admin profile
    Route::get('/profile/{superadmin}','App\Http\Controllers\SuperAdmin\DahboardController@profile')->name('profile');
    //super admin profile update
    Route::post('/profile-update/{superadmin}','App\Http\Controllers\SuperAdmin\DahboardController@profileUpdate')->name('profile.update');
    //dealer crud
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

   //orders routes
   Route::get('orders-list','App\Http\Controllers\SuperAdmin\OrderController@ordersList')->name('orders.list');
   //order status
   Route::get('orders-status','App\Http\Controllers\SuperAdmin\OrderController@orderStatus')->name('order.status');

   //admin setting
   Route::get('show-admin-setting','App\Http\Controllers\SuperAdmin\DahboardController@showAdminSetting')->name('show.admin.setting');
   Route::post('update-admin-setting','App\Http\Controllers\SuperAdmin\DahboardController@updateAdminSetting')->name('update.admin.setting');
   
   
   //spareparts crud

   //spareparts list
   Route::get('/spare-parts-list','App\Http\Controllers\SuperAdmin\SparePartsController@sparePartsList')->name('spare.parts.list');

   //spare parts create or edit
   Route::get('/spare-parts-view/{spare?}','App\Http\Controllers\SuperAdmin\SparePartsController@sparePartsView')->name('spare.parts.view');
  
   //spareparts store and update
   Route::post('/spare-parts-store','App\Http\Controllers\SuperAdmin\SparePartsController@sparePartsStore')->name('spare.parts.store');

   //spare parts delete
   Route::post('/spare-parts-delete/{spare}','App\Http\Controllers\SuperAdmin\SparePartsController@sparePartsDelete')->name('spare.parts.delete');

   //vehicle crud

   //vehicle list
   Route::get('/vehicle-list','App\Http\Controllers\SuperAdmin\VehicleController@vehicleList')->name('vehicle.list');

   //vehicle create or edit
   Route::get('/vehicle-view/{vehicle?}','App\Http\Controllers\SuperAdmin\VehicleController@vehicleView')->name('vehicle.view');
  
   //vehicle store and update
   Route::post('/vehicle-store','App\Http\Controllers\SuperAdmin\VehicleController@vehicleStore')->name('vehicle.store');

   //vehicle delete
   Route::post('/vehicle-delete/{vehicle}','App\Http\Controllers\SuperAdmin\VehicleController@vehicleDelete')->name('vehicle.delete');


   //service crud

   //service list
   Route::get('/service-list','App\Http\Controllers\SuperAdmin\ServiceController@serviceList')->name('service.list');

   //vehicle create or edit
   Route::get('/service-view/{service?}','App\Http\Controllers\SuperAdmin\ServiceController@serviceView')->name('service.view');
  
   //vehicle store and update
   Route::post('/service-store','App\Http\Controllers\SuperAdmin\ServiceController@serviceStore')->name('service.store');

   //vehicle delete
   Route::post('/service-delete/{service}','App\Http\Controllers\SuperAdmin\ServiceController@serviceDelete')->name('service.delete');

});

//dealers route
Route::group(['prefix'=>'dealers','middleware'=>['auth','isActive'] ],function(){



    Route::get('/dashboard','App\Http\Controllers\Dealers\DahboardController@index')->name('dealers.dashboard');

    //dealer profile
    Route::get('/profile/{dealer}','App\Http\Controllers\Dealers\DahboardController@profile')->name('dealers.profile');

    //super admin profile update
    Route::post('/profile-update/{dealer}','App\Http\Controllers\Dealers\DahboardController@profileUpdate')->name('dealers.profile.update');




    //spareparts crud

   //spareparts list
   Route::get('/spare-parts-list','App\Http\Controllers\Dealers\SparePartsController@sparePartsList')->name('dealers.spare.parts.list');

   //spare parts create or edit
   Route::get('/spare-parts-view/{spare?}','App\Http\Controllers\Dealers\SparePartsController@sparePartsView')->name('dealers.spare.parts.view');
  
   //spareparts store and update
   Route::post('/spare-parts-store','App\Http\Controllers\Dealers\SparePartsController@sparePartsStore')->name('dealers.spare.parts.store');

   //spare parts delete
   Route::post('/spare-parts-delete/{spare}','App\Http\Controllers\Dealers\SparePartsController@sparePartsDelete')->name('dealers.spare.parts.delete');

   //vehicle crud

   //vehicle list
   Route::get('/vehicle-list','App\Http\Controllers\Dealers\VehicleController@vehicleList')->name('dealers.vehicle.list');

   //vehicle create or edit
   Route::get('/vehicle-view/{vehicle?}','App\Http\Controllers\Dealers\VehicleController@vehicleView')->name('dealers.vehicle.view');
  
   //vehicle store and update
   Route::post('/vehicle-store','App\Http\Controllers\Dealers\VehicleController@vehicleStore')->name('dealers.vehicle.store');

   //vehicle delete
   Route::post('/vehicle-delete/{vehicle}','App\Http\Controllers\Dealers\VehicleController@vehicleDelete')->name('dealers.vehicle.delete');


    //service list
   Route::get('/service-list','App\Http\Controllers\Dealers\ServiceController@serviceList')->name('dealers.service.list');

   //vehicle create or edit
   Route::get('/service-view/{service?}','App\Http\Controllers\Dealers\ServiceController@serviceView')->name('dealers.service.view');
  
   //vehicle store and update
   Route::post('/service-store','App\Http\Controllers\Dealers\ServiceController@serviceStore')->name('dealers.service.store');

   //vehicle delete
   Route::post('/service-delete/{service}','App\Http\Controllers\Dealers\ServiceController@serviceDelete')->name('dealers.service.delete');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
