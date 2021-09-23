<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Api\DanhmucsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("home", "App\Http\Controllers\Api\HomeController");
// Route::apiResource("danhmucs", "App\Http\Controllers\Api\DanhMucsController");

Route::group(['prefix' => '/danh-muc'], function(){
    Route::get('/them-moi', 'App\Http\Controllers\Api\DanhMucsController@create')->name('danhmucs.create');
    Route::post('/them-moi', 'App\Http\Controllers\Api\DanhMucsController@store')->name('danhmucs.store');
    Route::get('/edit/{id}', 'App\Http\Controllers\Api\DanhMucsController@edit')->name('danhmucs.edit');
    Route::post('/cap-nhat/{id}', 'App\Http\Controllers\Api\DanhMucsController@update')->name('danhmucs.update');
    Route::get('/danh-sach', 'App\Http\Controllers\Api\DanhMucsController@index')->name('danhmucs.list');
    Route::post('/more-data', 'App\Http\Controllers\Api\DanhMucsController@more_data')->name('danhmucs.more-data');
});

Route::group(['prefix' => '/slide'], function(){
    Route::get('/them-moi', 'App\Http\Controllers\Api\SlidesController@create')->name('slides.create');
    Route::post('/them-moi', 'App\Http\Controllers\Api\SlidesController@store')->name('slides.store');
    Route::get('/edit/{id}', 'App\Http\Controllers\Api\SlidesController@edit')->name('slides.edit');
    Route::post('/cap-nhat/{id}', 'App\Http\Controllers\Api\SlidesController@update')->name('slides.update');
    Route::get('/danh-sach', 'App\Http\Controllers\Api\SlidesController@index')->name('slides.list');
    Route::post('/more-data', 'App\Http\Controllers\Api\SlidesController@more_data')->name('slides.more-data');
});

Route::group(['prefix' => '/sach'], function(){
    Route::get('/them-moi', 'App\Http\Controllers\Api\SachsController@create')->name('sachs.create');
    Route::post('/them-moi', 'App\Http\Controllers\Api\SachsController@store')->name('sachs.store');
    Route::get('/edit/{id}', 'App\Http\Controllers\Api\SachsController@edit')->name('sachs.edit');
    Route::post('/cap-nhat/{id}', 'App\Http\Controllers\Api\SachsController@update')->name('sachs.update');
    Route::get('/danh-sach', 'App\Http\Controllers\Api\SachsController@index')->name('sachs.list');
    Route::post('/more-data', 'App\Http\Controllers\Api\SachsController@more_data')->name('sachs.more-data');
});

Route::group(['prefix' => '/mua-sach'], function(){
    Route::get('/trang-chu', 'App\Http\Controllers\Api\TrangChuController@trangchu')->name('muasach.trangchu');
    Route::get('/tat-ca-sach', 'App\Http\Controllers\Api\TrangChuController@tatcasach')->name('muasach.tatcasach');
    Route::get('/sach-theo-danh-muc/{id}', 'App\Http\Controllers\Api\TrangChuController@sachtheodanhmuc')->name('muasach.sachtheodanhmuc');
    Route::get('/chi-tiet-sach/{id}', 'App\Http\Controllers\Api\TrangChuController@chitietsach')->name('muasach.chitietsach');
    Route::post('/save-cart', 'App\Http\Controllers\Api\CartController@save_cart')->name('muasach.savecart');
    Route::post('/update-cart-quantity', 'App\Http\Controllers\Api\CartController@update_cart_quantity')->name('muasach.updatecartquantity');
    Route::get('/show-cart', 'App\Http\Controllers\Api\CartController@show_cart')->name('muasach.showcart');
    Route::get('/delete-to-cart/{rowId}', 'App\Http\Controllers\Api\CartController@delete_to_cart')->name('muasach.deletetocart');

    // checkout
    Route::get('/login-checkout', 'App\Http\Controllers\Api\CheckoutController@login_checkout')->name('muasach.logincheckout');
    Route::get('/logout-checkout', 'App\Http\Controllers\Api\CheckoutController@logout_checkout')->name('muasach.logoutcheckout');
    Route::post('/login-customer', 'App\Http\Controllers\Api\CheckoutController@login_customer')->name('muasach.logincustomer');
    Route::post('/add-customer', 'App\Http\Controllers\Api\CheckoutController@add_customer')->name('muasach.addcustomer');
    Route::get('/checkout', 'App\Http\Controllers\Api\CheckoutController@checkout')->name('muasach.checkout');
    Route::get('/payment', 'App\Http\Controllers\Api\CheckoutController@payment')->name('muasach.payment');
    Route::post('/save-checkout-customer', 'App\Http\Controllers\Api\CheckoutController@save_checkout_customer')->name('muasach.savecheckoutcustomer');
    Route::post('/order-place', 'App\Http\Controllers\Api\CheckoutController@order_place')->name('muasach.orderplace');
});