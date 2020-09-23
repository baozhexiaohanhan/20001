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
Route::get('/brand/brand','Admin\BrandController@create')->middleware('checklogin');
Route::post('/brand/store','Admin\BrandController@store');
Route::get('/brand/index','Admin\BrandController@index')->middleware('checklogin');
Route::post('/brand/uploads','Admin\BrandController@uploads');
Route::get('/brand/edit/{id}','Admin\BrandController@edit');
Route::post('/brand/update/{id}','Admin\BrandController@update');
Route::get('/brand/destroy/{id?}','Admin\BrandController@destroy');
Route::get('/brand/change','Admin\BrandController@change');



//注册。登录
Route::view('/login','admin.login');
Route::any('/admin/logindo','Admin\LoginController@logindo');
Route::view('/reg','admin.reg');
Route::any('/admin/Doreg','Admin\RegController@Doreg');
//分类管理

Route::get('cate','Admin\CateController@index');//列表展示
Route::get('/cate/create','Admin\CateController@create');//添加页面
Route::post('/cate/store','Admin\CateController@store');//执行添加
Route::get('/cate/edit/{id}','Admin\CateController@edit');//编辑展示页面
Route::post('/cate/update/{id}','Admin\CateController@update');//执行编辑
Route::get('/cate/destroy/{id}','Admin\CateController@destroy');//删除

//商品
Route::prefix('student')->middleware('checklogin')->group(function() {
    Route::get('create', 'studentController@create');
    Route::any('store', 'studentController@store');
    Route::get('index', 'studentController@index');
    Route::get('edit/{id}', 'studentController@edit');
    Route::post('update/{id}', 'studentController@update');
    Route::get('destroy/{id}', 'studentController@destroy');
    Route::post('upload', 'studentController@upload');

    
});



//管理员
    Route::get('/admin/index', 'Admin\AdminController@index');
    Route::get('/admin/create', 'Admin\AdminController@create');
    Route::post('/admin/store', 'Admin\AdminController@store');
    Route::get('/admin/destroy/{id}', 'Admin\AdminController@destroy');

    Route::prefix('role')->group(function () {
        Route::get('/', 'Admin\RoleController@index')->name('role');
        Route::get('/create', 'Admin\RoleController@create')->name('role.create');
        Route::post('/store', 'Admin\RoleController@store');
    });

    Route::prefix('menu')->group(function () {
        Route::get('/', 'Admin\MenuController@index')->name('menu');
        Route::get('/create', 'Admin\MenuController@create')->name('menu.create');
        Route::post('/store', 'Admin\MenuController@store');

    });
    Route::get('/role/menu/{id}', 'Admin\RoleController@menu');
    Route::prefix('admin')->group(function () {
        Route::get('/', 'Admin\AdminController@index')->name('index');
        Route::get('/create', 'Admin\AdminController@create')->name('admin.create');
        Route::post('/store', 'Admin\AdminController@store');

    });
    Route::prefix('type')->group(function () {
        Route::get('/', 'Admin\TypeController@index')->name('index');
        Route::get('/create', 'Admin\TypeController@create')->name('type.create');
        Route::post('/store', 'Admin\TypeController@store');
        Route::get('/attr/{id}', 'Admin\TypeController@attr');
    });
    Route::prefix('attr')->group(function () {
        Route::get('/', 'Admin\AttrController@index')->name('index');
        Route::get('/create/{id}', 'Admin\AttrController@create')->name('attr.create');
        Route::post('/store', 'Admin\AttrController@store');
    });
    Route::prefix('goods')->group(function () {
        Route::get('/', 'Admin\GoodsControlle@index')->name('index');
        Route::get('/create/', 'Admin\GoodsControlle@create')->name('goods.create');
        Route::post('/store', 'Admin\GoodsControlle@store');
    });
