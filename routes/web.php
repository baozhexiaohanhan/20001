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
    return view('welcome');
});
//  后台首页.品牌
Route::get('/brand/brand','Admin\BrandController@create');
Route::post('/brand/store','Admin\BrandController@store');
Route::get('/brand/index','Admin\BrandController@index');
Route::post('/brand/uploads','Admin\BrandController@uploads');
Route::get('/brand/edit/{id}','Admin\BrandController@edit');
Route::post('/brand/update/{id}','Admin\BrandController@update');
Route::get('/brand/destroy/{id?}','Admin\BrandController@destroy');
Route::get('/brand/change','Admin\BrandController@change');

//商品
Route::prefix('student')->group(function() {
    Route::get('create', 'studentController@create');
    Route::post('store', 'studentController@store');
    Route::get('index', 'studentController@index');
    Route::get('edit/{id}', 'studentController@edit');
    Route::post('update/{id}', 'studentController@update');
    Route::get('destroy/{id}', 'studentController@destroy');
});



