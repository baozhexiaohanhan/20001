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
Route::prefix('goods')->middleware('checklogin')->group(function() {
    Route::get('create', 'GoodsController@create');
    Route::any('store', 'GoodsController@store');
    Route::get('index', 'GoodsController@index');
    Route::get('edit/{goods_id}', 'GoodsController@edit');
    Route::post('update/{goods_id}', 'GoodsController@update');
    Route::get('destroy/{goods_id}', 'GoodsController@destroy');
    Route::post('upload', 'GoodsController@upload');
    
});

Route::prefix('index')->middleware('checklogin')->group(function() {
    Route::get('item', 'IndexController@item');
    Route::get('index', 'IndexController@index');

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
        Route::get('/destroy/{id}', 'Admin\RoleController@destroy');
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
         Route::get('/destroy/{id}', 'Admin\TypeController@destroy');
    });
    Route::prefix('attr')->group(function () {
        Route::get('/', 'Admin\AttrController@index')->name('index');
        Route::get('/create/{id}', 'Admin\AttrController@create')->name('attr.create');
        Route::post('/store', 'Admin\AttrController@store');
    });

//广告
Route::get('/list','Admin\PosterController@list');
Route::get('/create','Admin\PosterController@create');
Route::post('/poster/store', 'Admin\PosterController@store');
Route::get('/poster/destroy/{id}','Admin\PosterController@destroy');//删除


Route::get('/ad','Admin\AdController@ad');//列表
Route::get('/creates','Admin\AdController@creates');//添加
Route::post('/ad/store', 'Admin\AdController@store');
Route::get('/ad/destroy/{id}','Admin\AdController@destroy');//删除

