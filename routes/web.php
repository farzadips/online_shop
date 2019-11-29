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
    Route::resource('categories','Backend\CategoryController');
    Route::resource('attributes-group','Backend\AttributeGroupController');
});
