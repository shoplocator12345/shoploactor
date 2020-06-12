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
    return view('index');
});
Route::get('/map/{id}', function () {
    return view('user.map');
})->name('map');
Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');
Route::get('/shop/{lat}/{lng}', 'user\CommonController@shop'); 
Route::get('/search/{search}','user\CommonController@search'); 
Route::get('/search','user\CommonController@searchForm'); 
Route::get('/visit/{id}', 'user\CommonController@show');




Route::get('/admin','CommonController@dashoard')->middleware('auth','role')->name('dashboard'); 


Route::get('/admin/Enquiry', function () {
    return view('admin.enquiry.index');
})->name('enquiry')->middleware('auth','role');

Route::get('/admin/shop', function () {
    return view('admin.shop.index');
})->name('shops')->middleware('auth','role');

Route::get('/admin/shop/create', function () {
    return view('admin.shop.form');
})->name('shops-create')->middleware('auth','role');

Route::get('/admin/shop/edit/{id}', function () {
    return view('admin.shop.editform');
})->name('shops-edit')->middleware('auth','shop');

Route::get('/admin/shop/manage/{id}','Admin\ShopController@show')->name('shop-manage')->middleware('auth','shop');


Route::get('/admin/product', function () {
    return view('admin.product.index');
})->name('products')->middleware('auth','role');

Route::get('/admin/product/manage/{id}','Admin\ProductController@show')->middleware('auth','role');


Auth::routes();

Route::get('/home', 'CommonController@dashoard')->middleware('auth','role')->name('dashboard');
