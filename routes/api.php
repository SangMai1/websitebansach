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

Route::middleware(['authencation'])->group(function () {
    Route::group(['prefix' => '/categories'], function(){
        Route::get('/create', 'App\Http\Controllers\Api\CategoriesController@create')->name('categories.create');
        Route::post('/create', 'App\Http\Controllers\Api\CategoriesController@store')->name('categories.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Api\CategoriesController@edit')->name('categories.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Api\CategoriesController@update')->name('categories.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Api\CategoriesController@destroy')->name('categories.delete');
        Route::get('/list', 'App\Http\Controllers\Api\CategoriesController@index')->name('categories.list');
        Route::post('/more-data', 'App\Http\Controllers\Api\CategoriesController@more_data')->name('categories.more-data');
        Route::get('/search', 'App\Http\Controllers\Api\CategoriesController@search')->name('categories.search');
    });
});

Route::middleware(['authencation'])->group(function () {
    Route::group(['prefix' => '/slide'], function(){
        Route::get('/create', 'App\Http\Controllers\Api\SlidesController@create')->name('slides.create');
        Route::post('/create', 'App\Http\Controllers\Api\SlidesController@store')->name('slides.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Api\SlidesController@edit')->name('slides.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Api\SlidesController@update')->name('slides.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Api\SlidesController@destroy')->name('slides.delete');
        Route::get('/list', 'App\Http\Controllers\Api\SlidesController@index')->name('slides.list');
        Route::post('/more-data', 'App\Http\Controllers\Api\SlidesController@more_data')->name('slides.more-data');
        Route::get('/search', 'App\Http\Controllers\Api\SlidesController@search')->name('slides.search');
    });
});

Route::middleware(['authencation'])->group(function () {
    Route::group(['prefix' => '/book'], function(){
        Route::get('/create', 'App\Http\Controllers\Api\BooksController@create')->name('books.create');
        Route::post('/create', 'App\Http\Controllers\Api\BooksController@store')->name('books.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Api\BooksController@edit')->name('books.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Api\BooksController@update')->name('books.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Api\BooksController@destroy')->name('books.delete');
        Route::get('/list', 'App\Http\Controllers\Api\BooksController@index')->name('books.list');
        Route::post('/more-data', 'App\Http\Controllers\Api\BooksController@more_data')->name('books.more-data');
        Route::get('/search', 'App\Http\Controllers\Api\BooksController@search')->name('books.search');
    });
});

Route::middleware(['authencation'])->group(function () {
    Route::group(['prefix' => '/warehouse'], function(){
        Route::get('/edit/{id}', 'App\Http\Controllers\Api\WarehousesController@edit')->name('warehouse.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Api\WarehousesController@update')->name('warehouse.update');
        Route::get('/list', 'App\Http\Controllers\Api\WarehousesController@index')->name('warehouse.list');
        Route::post('/more-data', 'App\Http\Controllers\Api\WarehousesController@more_data')->name('warehouse.more-data');
        Route::get('/search', 'App\Http\Controllers\Api\WarehousesController@search')->name('warehouse.search');
    });
});

Route::middleware(['authencation'])->group(function () {
    Route::group(['prefix' => '/customer'], function(){
        Route::get('/delete/{id}', 'App\Http\Controllers\Api\CustomersController@destroy')->name('customer.delete');
        Route::get('/list', 'App\Http\Controllers\Api\CustomersController@index')->name('customer.list');
        Route::post('/more-data', 'App\Http\Controllers\Api\CustomersController@more_data')->name('customer.more-data');
        Route::get('/search', 'App\Http\Controllers\Api\CustomersController@search')->name('customer.search');
    });
});

Route::middleware(['authencation'])->group(function () {
    Route::group(['prefix' => '/mission'], function(){
        Route::get('/create', 'App\Http\Controllers\Api\MissionsController@create')->name('mission.create');
        Route::post('/create', 'App\Http\Controllers\Api\MissionsController@store')->name('mission.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Api\MissionsController@edit')->name('mission.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Api\MissionsController@update')->name('mission.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Api\MissionsController@destroy')->name('mission.delete');
        Route::get('/list', 'App\Http\Controllers\Api\MissionsController@index')->name('mission.list');
        Route::post('/more-data', 'App\Http\Controllers\Api\MissionsController@more_data')->name('mission.more-data');
        Route::get('/search', 'App\Http\Controllers\Api\MissionsController@search')->name('mission.search');
    });
});

Route::middleware(['authencation'])->group(function () {
    Route::group(['prefix' => '/user'], function(){
        Route::get('/create', 'App\Http\Controllers\Api\UsersController@create')->name('user.create');
        Route::post('/create', 'App\Http\Controllers\Api\UsersController@store')->name('user.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Api\UsersController@edit')->name('user.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Api\UsersController@update')->name('user.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Api\UsersController@destroy')->name('user.delete');
        Route::get('/list', 'App\Http\Controllers\Api\UsersController@index')->name('user.list');
        Route::post('/more-data', 'App\Http\Controllers\Api\UsersController@more_data')->name('user.more-data');
        Route::get('/search', 'App\Http\Controllers\Api\UsersController@search')->name('user.search');
    });
});

Route::middleware(['authencation'])->group(function () {
    Route::group(['prefix' => '/order-admin'], function(){
        Route::get('/edit/{id}', 'App\Http\Controllers\Api\OrdersController@edit')->name('orderadmin.edit');
        Route::post('/cap-nhat/{id}', 'App\Http\Controllers\Api\OrdersController@update')->name('orderadmin.update');
        Route::get('/danh-sach', 'App\Http\Controllers\Api\OrdersController@index')->name('orderadmin.list');
        Route::post('/more-data', 'App\Http\Controllers\Api\OrdersController@more_data')->name('orderadmin.more-data');
        Route::get('/details/{id}', 'App\Http\Controllers\Api\OrdersController@details_order')->name('orderadmin.detailsorder');
    });
});

Route::middleware(['authencation'])->group(function () {
    Route::group(['prefix' => '/review'], function(){
        Route::get('/reply/{id}', 'App\Http\Controllers\Api\ReviewsController@reply')->name('review.reply');
        Route::post('/save-reply', 'App\Http\Controllers\Api\ReviewsController@save_reply')->name('review.savereply');
        Route::get('/get-list', 'App\Http\Controllers\Api\ReviewsController@get_list')->name('review.getlist');
        Route::post('/more-data', 'App\Http\Controllers\Api\ReviewsController@more_data')->name('review.more-data');
    });
});

Route::group(['prefix' => '/mua-sach'], function(){
    Route::get('/trang-chu', 'App\Http\Controllers\Api\TrangChuController@home_website')->name('muasach.trangchu');
    Route::get('/tat-ca-sach', 'App\Http\Controllers\Api\TrangChuController@book_all')->name('muasach.tatcasach');
    Route::get('/sach-theo-danh-muc/{id}', 'App\Http\Controllers\Api\TrangChuController@book_in_categories')->name('muasach.sachtheodanhmuc');
    Route::get('/chi-tiet-sach/{id}', 'App\Http\Controllers\Api\TrangChuController@book_details')->name('muasach.chitietsach');
    Route::post('/save-cart', 'App\Http\Controllers\Api\CartController@save_cart')->name('muasach.savecart');
    Route::post('/update-cart-quantity', 'App\Http\Controllers\Api\CartController@update_cart_quantity')->name('muasach.updatecartquantity');
    Route::get('/show-cart', 'App\Http\Controllers\Api\CartController@show_cart')->name('muasach.showcart');
    Route::get('/delete-to-cart/{rowId}', 'App\Http\Controllers\Api\CartController@delete_to_cart')->name('muasach.deletetocart');

    // checkout
    Route::get('/register-checkout', 'App\Http\Controllers\Api\CheckoutController@register_checkout')->name('muasach.registercheckout');
    Route::get('/login-checkout', 'App\Http\Controllers\Api\CheckoutController@login_checkout')->name('muasach.logincheckout');
    Route::get('/logout-checkout', 'App\Http\Controllers\Api\CheckoutController@logout_checkout')->name('muasach.logoutcheckout');
    Route::post('/login-customer', 'App\Http\Controllers\Api\CheckoutController@login_customer')->name('muasach.logincustomer');
    Route::get('/edit-customer', 'App\Http\Controllers\Api\CheckoutController@find_customer')->name('muasach.editcustomer');
    Route::post('/update-customer/{id}', 'App\Http\Controllers\Api\CheckoutController@update_customer')->name('muasach.updatecustomer');
    Route::post('/add-customer', 'App\Http\Controllers\Api\CheckoutController@add_customer')->name('muasach.addcustomer');
    Route::get('/checkout', 'App\Http\Controllers\Api\CheckoutController@checkout')->name('muasach.checkout');
    Route::get('/payment', 'App\Http\Controllers\Api\CheckoutController@payment')->name('muasach.payment');
    Route::post('/get-payment', 'App\Http\Controllers\Api\CheckoutController@get_payment')->name('muasach.getpayment');
    Route::post('/save-checkout-customer', 'App\Http\Controllers\Api\CheckoutController@save_checkout_customer')->name('muasach.savecheckoutcustomer');
    Route::get('/edit-checkout-customer/{id}', 'App\Http\Controllers\Api\CheckoutController@edit_check_customer')->name('muasach.editcheckoutcustomer');
    Route::post('/update-checkout-customer/{id}', 'App\Http\Controllers\Api\CheckoutController@update_check_customer')->name('muasach.updatecheckoutcustomer');
    Route::post('/order-place', 'App\Http\Controllers\Api\CheckoutController@order_place')->name('muasach.orderplace');
    Route::get('/product-order', 'App\Http\Controllers\Api\CheckoutController@order_product')->name('muasach.orderproduct');

    //đổi sách
    Route::get('/change-product', 'App\Http\Controllers\Api\CheckoutController@change_product')->name('muasach.changeproduct');
    Route::get('/change-product-item/{id}', 'App\Http\Controllers\Api\CheckoutController@change_product_item')->name('muasach.changeproductitem');
    Route::post('/update-change-product-item', 'App\Http\Controllers\Api\CheckoutController@update_change_product_item')->name('muasach.updatechangeproductitem');

    // Review
    Route::post('/list', 'App\Http\Controllers\Api\ReviewsController@index')->name('muasach.list');
    Route::post('/create', 'App\Http\Controllers\Api\ReviewsController@store')->name('muasach.create');

});

Route::get("/loginadmin", 'App\Http\Controllers\Api\LoginController@loginadmin');
Route::post('/logintest', 'App\Http\Controllers\Api\LoginController@check');
Route::get("/logoutadmin", 'App\Http\Controllers\Api\LoginController@get_logout_admin');

Route::get('/khongco', function () {
    echo "Bạn không có quyền truy cập vào đây";
})->name('khongco');