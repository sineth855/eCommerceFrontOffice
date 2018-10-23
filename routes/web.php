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

Route::get('{path}', function () {
    return view('index');
})->where('path', '(.*)');

Route::get('password/reset/{token}', function () {
    return view('index');
})->name('password.reset');

Route::post('/AddToCart','FrontEnd\Product\CartController@AddToCart');
Route::group(['middleware' => ['SettingConfig']], function () {
    // Front End
   
    Route::post('/RemoveFromCart','FrontEnd\Product\CartController@RemoveFromCart');
    Route::post('/UpdateCart','FrontEnd\Product\CartController@UpdateCart');
    Route::post('/checkout','FrontEnd\Product\CartController@Checkout');
    // Front End Router
    Route::resource('/', 'FrontEnd\Product\CartController');
    Route::get('my_account', 'FrontEnd\Product\CartController@index');
    Route::get('signin', 'FrontEnd\Product\CartController@index');

    // Account Customer
    // Route::get('/api/address', 'FrontEnd\Account\AddressController@index');
    // Route::get('/api/get_checkout_address', 'FrontEnd\Account\AddressController@getCheckoutAddress');
    // Route::get('/api/customer_info', 'FrontEnd\Account\AccountController@getCustomer');
    // Route::get('/api/wishlist', 'FrontEnd\Account\WishlistController@index');
    // Route::resource('/api/order', 'FrontEnd\Account\OrderController');

    // // Front End API
    // Route::get('/api/getTest', 'FrontEnd\TestController@getTest');
    // Route::get('/api/show/{id}', 'FrontEnd\TestController@getShow');
    // Route::put('/api/update', 'FrontEnd\TestController@UpdateApi');
    // // =====Store
    // Route::get('/api/store/getStoreData', 'FrontEnd\Store\StoreController@index');
    // /*|Api Request Header--*/
    // Route::get('/api/header','FrontEnd\Common\HeaderController@index');
    // /*--| Api Request Slide--*/
    // Route::get('/api/slide','FrontEnd\Includes\SlideController@index');
    // /*--| Api Request Product--*/
    // Route::resource('/api/category','FrontEnd\Product\CategoryController');
    // Route::get('/api/latest','FrontEnd\Product\LastestController@index');
    // Route::get('/api/bestSeller','FrontEnd\Product\BestSellerController@index');
    // Route::get('/api/recommandProduct','FrontEnd\Product\RecommandController@index');
    // Route::get('/api/product_detail/{product_id}/{category_id}','FrontEnd\Product\ProductController@index');

    /*--| Api Request Banner--*/
    // Route::get('/api/banner','FrontEnd\Design\BannerController@index');

    // Route::resource('test/', 'FrontEnd\TestController');
    // Route::get('/api/getTest', 'FrontEnd\TestController@getTest');
    // Route::get('/api/show/{id}', 'FrontEnd\TestController@getShow');
    // Route::put('/api/update', 'FrontEnd\TestController@UpdateApi');
});
