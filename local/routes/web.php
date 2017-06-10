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
Route::get('/','WellComeController@getHome');
Route::get('danh-sach-dm/{id}/{slug}','WellComeController@getDanhSach');
Route::get('chi-tiet/{id}/{slug}','WellComeController@getChitiet');
Route::get('tim-kiem','WellComeController@getTimKiem');
Route::get('dang-ky','WellComeController@getDangKy');
Route::post('dang-ky','WellComeController@postDangKy');
Route::get('dang-nhap','WellComeController@getLogin');
Route::post('dang-nhap','WellComeController@postLogin');
Route::post('binh-luan/{id}','Admin\CommentController@Comment');
Route::get('dang-xuat','WellComeController@Logout');

Route::get('mua-hang/{id}','WellComeController@getMuaHang')->where(['id'=>'[0->9]+']);
Route::get('xoa-hang/{id}','WellComeController@getXoaHang');
Route::get('cartUpdate','WellComeController@getCartUpdate');
Route::get('cart','WellComeController@getGioHang');
Route::post('cart','WellComeController@postGioHang');
Route::get('search','WellComeController@getSearch');
Route::get('complex','WellComeController@getComplex');



Route::get('login','Admin\LoginController@getLogin');
Route::post('login','Admin\LoginController@postLogin');

Route::get('logout','Admin\LoginController@getLogout');

Route::group(['prefix' => 'admin','middleware'=>'auth'], function() {

   Route::get('index','Admin\HomeController@getIndex');
   
   Route::group(['prefix' => 'user'], function() {

   	   Route::get('list','Admin\UserController@getList');

   	   Route::get('del/{id}','Admin\UserController@getDel');

       Route::get('add','Admin\UserController@getAdd');
       Route::post('add','Admin\UserController@postAdd');

       Route::get('edit/{id}','Admin\UserController@getEdit');
       Route::post('edit/{id}','Admin\UserController@postEdit');
   });

   Route::group(['prefix' => 'cat'], function() {
      Route::get('list','Admin\CatController@getList');

      Route::get('add','Admin\CatController@getAdd');
      Route::post('add','Admin\CatController@postAdd');

      Route::get('edit/{id}','Admin\CatController@getEdit');
      Route::post('edit/{id}','Admin\CatController@postEdit');

      Route::get('del/{id}','Admin\CatController@getDel');

   });

   Route::group(['prefix' => 'product'], function() {
      Route::get('list','Admin\ProductController@getList');

      Route::get('add','Admin\ProductController@getAdd');
      Route::post('add','Admin\ProductController@postAdd');

      Route::get('edit/{id}','Admin\ProductController@getEdit');
      Route::post('edit/{id}','Admin\ProductController@postEdit');

      Route::get('del/{id}','Admin\ProductController@getDel');

   });
});