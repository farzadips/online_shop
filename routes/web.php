<?php

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
    return view('welcome');
});

//Route::group(['middleware'=>'admin'],function (){
//    Route::prefix('admin')->group(function (){
//       Route::get('users',function (){
//       });
//    });
//});

Route::prefix('administrator')->group(function () {
    Route::get('/', 'Backend\MainController@mainPage');
    Route::resource('categories', 'Backend\CategoryController');
    Route::get('/categories/{id}/settings', 'Backend\CategoryController@indexSetting')->name('categories.indexSetting');
    Route::post('/categories/{id}/settings', 'Backend\CategoryController@saveSetting');
    Route::resource('attributes-group', 'Backend\AttributeGroupController');
    Route::resource('attributes-value', 'Backend\AttributeValueController');
    Route::resource('brands', 'Backend\BrandController');
    Route::resource('photos', 'Backend\PhotoController');
    Route::post('photos/upload', 'Backend\PhotoController@upload')->name('photos.upload');
    Route::resource('products', 'Backend\ProductController');
    Route::resource('coupons', 'Backend\CouponController');
    Route::get('orders', 'Backend\OrderController@index');
    Route::get('orders/lists/{id}', 'Backend\OrderController@getOrderLists')->name('orders.lists');
});
