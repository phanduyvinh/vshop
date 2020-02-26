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

// Khai báo
Route::resource('brand','BrandController');
Route::resource('category','CategoryController');
Route::resource('product','ProductController');
Route::resource('customer','CustomerController');
Route::resource('order','OrderController');

// Xử lí giỏ hàng
Route::resource('cart','CartController');
Route::get('addcart/{id}','CartController@addCart')->name('addCart');
Route::get('delcart/{id}','CartController@delete')->name('delcart');
Route::get('delallcart','CartController@deleteall')->name('delallcart');
Route::post('setquantity','CartController@setquantity')->name('setquantity');
Route::get('checkout','CartController@checkout')->name('checkout');


// ###### Trang dành cho khách hàng ##############
Route::get('/','HandlingController@index')->name('home');
Route::get('productcategory/{id}','HandlingController@productIncategory')->name('productcategory');
Route::get('productbrand/{id}','HandlingController@productInbrand')->name('productbrand');
Route::get('productsearch','HandlingController@search')->name('productsearch');
Route::get('productdetail/{id}','HandlingController@productdetail')->name('productdetail');
// Xem và cập nhập tài khoản
Route::get('account','HandlingController@account')->name('account');
Route::put('update_account','HandlingController@update_account')->name('update_account');

// Thay doi mat khau account
Route::get('changepassword','HandlingController@changepassword')->name('changepassword');
Route::post('confirmpassword','HandlingController@confirmpassword')->name('confirmpassword');

// Xem chi tiết đơn hàng
Route::get('orderdetail/{id}','HandlingController@orderdetail')->name('orderdetail');

// Đăng ký, đăng nhập, đăng xuất
Route::get('register','HandlingController@register')->name('register');
Route::post('registerconfirm','HandlingController@registerconfirm')->name('registerconfirm');
Route::get('login','HandlingController@login')->name('login');
Route::post('confirmlogin','HandlingController@confirmlogin');
Route::get('logout','HandlingController@logout')->name('logout');
Route::get('resetpassword/{id}','HandlingController@resetpassword')->name('resetpassword');

//Control panel
Route::get('controlpanel','HandlingController@controlpanel')->name('controlpanel');
Route::get('productInbrand/{id}','BrandController@productbrand')->name('productInbrand');
Route::get('productIncategory/{id}','CategoryController@productcategory')->name('productIncategory');