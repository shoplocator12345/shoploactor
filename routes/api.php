<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resources([
    'admin/shop'        => 'admin\ShopController',
    'admin/product'   => 'admin\ProductController',
]);
Route::get('admin/single-shop/{id}','Admin\ShopController@ShowSingle');
Route::post('admin/shop/{id}','Admin\ShopController@update');
Route::get('admin/Shoplist','Admin\ShopController@AllShop');
Route::post('admin/shopProduct','Admin\ShopController@AddToSHop');
Route::get('admin/ShopProduct/{id}','Admin\ProductController@ShopProduct');

Route::get('admin/ProductEdit/{id}','Admin\ProductController@ShowEdit');
Route::post('admin/product/{id}','Admin\ProductController@update');
Route::get('admin/Productlist','Admin\ProductController@ALlProduct');

Route::get( 'admin/dashboard/user', 'CommonController@DashboardUser');


Route::post('user','CommonController@AddUser');
Route::get('admin/user-block/{id}','CommonController@UserBlock');

Route::get('admin/enquiry/','CommonController@enquiry');




Route::delete( 'admin/shoptoproduct/{prod_id}/{shop_id}', 'CommonController@ShopToProduct');


//Front end

Route::get( 'map/{id}', 'user\CommonController@map');
Route::post( 'contact', 'user\CommonController@contact');
Route::get( 'LatestDay', 'user\CommonController@ProductOfDay');
Route::get( 'RecentVisit/{id}', 'user\CommonController@RecentVisit');


