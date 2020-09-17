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
//品牌管理
//  后台首页.品牌
Route::middleware('checklogin')->group(function(){
Route::get('/brand/brand','Admin\BrandController@create');
Route::get('/brand/brand','Admin\BrandController@create')->middleware('checklogin');
Route::post('/brand/store','Admin\BrandController@store');
Route::get('/brand/index','Admin\BrandController@index')->middleware('checklogin');
Route::post('/brand/uploads','Admin\BrandController@uploads');
Route::get('/brand/edit/{id}','Admin\BrandController@edit');
Route::post('/brand/update/{id}','Admin\BrandController@update');
Route::get('/brand/destroy/{id?}','Admin\BrandController@destroy');
Route::get('/brand/change','Admin\BrandController@change');

});

//注册。登录
Route::view('/login','admin.login');
Route::any('/admin/logindo','Admin\LoginController@logindo');
Route::view('/reg','admin.reg');
Route::any('/admin/Doreg','Admin\RegController@Doreg');
//分类管理
Route::middleware('checklogin')->group(function(){
Route::get('cate','Admin\CateController@index');//列表展示
Route::get('/cate/create','Admin\CateController@create');//添加页面
Route::post('/cate/store','Admin\CateController@store');//执行添加
Route::get('/cate/edit/{id}','Admin\CateController@edit');//编辑展示页面
Route::post('/cate/update/{id}','Admin\CateController@update');//执行编辑
Route::get('/cate/destroy/{id}','Admin\CateController@destroy');//删除
});

//商品
Route::prefix('student')->middleware('checklogin')->group(function() {
    Route::get('create', 'studentController@create');
    Route::post('store', 'studentController@store');
    Route::get('index', 'studentController@index');
    Route::get('edit/{id}', 'studentController@edit');
    Route::post('update/{id}', 'studentController@update');
    Route::get('destroy/{id}', 'studentController@destroy');
});



Route::middleware('checklogin')->group(function(){
//管理员

Route::get('/user/index','Admin\UserController@index');
Route::get('/user/create','Admin\UserController@create');
Route::post('/user/store','Admin\UserController@store');
Route::get('/user/destroy/{id}','Admin\UserController@destroy');

Route::prefix('role')->group(function (){
    Route::get('/','Admin\RoleController@index')->name('role');
    Route::get('/create','Admin\RoleController@create')->name('role.create');
    Route::post('/store','Admin\RoleController@store');
});

Route::prefix('menu')->group(function (){
    Route::get('/','Admin\MenuController@index')->name('menu');
    Route::get('/create','Admin\MenuController@create')->name('menu.create');
    Route::post('/store','Admin\MenuController@store');
});

Route::prefix('admin')->group(function (){
    Route::get('/','Admin\AdminController@index')->name('index');
    Route::get('/create','Admin\AdminController@create')->name('admin.create');
    Route::post('/store','Admin\AdminController@store');
});
});
