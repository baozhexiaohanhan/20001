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
Route::middleware('checklogin')->group(function(){
Route::get('/', function () {
    return view('layout.layout');
});
//品牌

Route::prefix('/brand')->group(function(){
  Route::get('/create','Brand\BrandController@create')->name('/brand/create');
  Route::get('/list','Brand\BrandController@index')->name('/brand/list');
  Route::post('/store','Brand\BrandController@store');
  Route::any('/uploads','Brand\BrandController@uploads');
  Route::get('/destroy','Brand\BrandController@destroy')->name('/brand/destroy');
  Route::get('/show/{id}','Brand\BrandController@show');
  Route::post('/edit/{id}','Brand\BrandController@edit')->name('/brand/edit');
  Route::post('/updated','Brand\BrandController@updated');
});
    //广告位置
    Route::get('/poster/create','Admin\PosterController@create');
    Route::post('/poster/store','Admin\PosterController@store');
    Route::any('/poster/list','Admin\PosterController@index');
    Route::get('/destroy','Admin\PosterController@destroy');
    Route::get('/poster/index','Admin\PosterController@index');
    Route::get('/poster/edit/{id}','Admin\PosterController@edit');
    Route::post('/poster/update/{id}','Admin\PosterController@update');
    Route::any('/poster/createad/{id}','Admin\PosterController@createad');
     //广告列表
    Route::get('/posters/create','Admin\PostersController@create');
    Route::post('/posters/store','Admin\PostersController@store');
    Route::any('/posters/list','Admin\PostersController@index');
    Route::get('/destroy','Admin\PosterController@destroy');
    Route::get('/poster/index','Admin\GoodstypeController@index');
    Route::get('/poster/edit/{id}','Admin\GoodstypeController@edit');
    Route::post('/poster/update/{id}','Admin\GoodstypeController@update');
//角色
Route::prefix('/role')->group(function(){
  Route::get('/create','Role\RoleController@create')->name('/role/create');
  Route::post('/store','Role\RoleController@store');
  Route::get('/list','Role\RoleController@index');
  Route::get('/destroy','Role\RoleController@destroy')->name('/role/destroy');
});
//权限（菜单）
Route::prefix('/weight')->group(function(){
  Route::get('/create','Weight\WeightController@create')->name('/weight/create');
  Route::post('/store','Weight\WeightController@store');
  Route::get('/list','Weight\WeightController@index');
  Route::get('/destroy','Weight\WeightController@destroy')->name('/weight/destroy');
  Route::get('/addpriv/{id}','Weight\WeightController@addpriv');
  Route::any('/addweight','Weight\WeightController@addweight');


});
//管理员
Route::prefix('/admin')->group(function(){
  Route::get('/create','Admin\AdminController@create')->name('/admin/create');
  Route::post('/store','Admin\AdminController@store');
  Route::get('/list','Admin\AdminController@index');
  Route::get('/destroy','Admin\AdminController@destroy')->name('/admin/destroy');
});
//商品
Route::prefix('/goods')->group(function(){
  Route::get('/create','Goods\GoodsController@create');
  Route::post('/upload','Goods\GoodsController@upload');
  Route::post('/uploads','Goods\GoodsController@uploads');
  Route::get('/getattr','Goods\GoodsController@getattr');
  Route::post('/store','Goods\GoodsController@store');
  Route::post('/pruct','Goods\GoodsController@pruct');
  Route::get('/list','Goods\GoodsController@list');
  Route::get('/item/{id}','Goods\GoodsController@item');










});

Route::prefix('/goodstype')->group(function(){
  Route::get('/create','GoodsType\GoodsTypeController@create')->name('/goodstype/create');
  Route::post('/store','GoodsType\GoodsTypeController@store');
  Route::get('/list','GoodsType\GoodsTypeController@index');
  Route::get('/destroy','GoodsType\GoodsTypeController@destroy')->name('/goodstype/destroy');
  Route::get('/addprop/{id}','GoodsType\GoodsTypeController@addprop');
  Route::post('/addpropdo','GoodsType\GoodsTypeController@addpropdo');
  Route::get('/proplist/{id}','GoodsType\GoodsTypeController@proplist');
  Route::get('/delattr','GoodsType\GoodsTypeController@delattr');
  Route::get('/addattr/{id}','GoodsType\GoodsTypeController@addattr');
  Route::post('/storeattr','GoodsType\GoodsTypeController@storeattr');

});
  //退出
  Route::get('/logout','Login\LoginController@logout');
  });

  //登录
  Route::get('/login','Login\LoginController@login');
  Route::post('/logindo','Login\LoginController@logindo');







Route::get('/seckil/create','seckil\SeckilController@create');
Route::any('/seckil/store','seckil\SeckilController@store');
Route::any('/seckil/list','seckil\SeckilController@list');