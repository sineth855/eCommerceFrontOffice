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
    Route::group(['middleware' => ['auth:api','SettingConfig']], function () {
        Route::post('logout', 'Auth\LoginController@logout');
        Route::resource('order', 'FrontEnd\Account\OrderController');
        //user
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        Route::patch('settings/profile', 'Settings\UpdateProfile');
        Route::patch('settings/password', 'Settings\UpdatePassword');
    });

    Route::group(['middleware' => ['SettingConfig']], function(){
        // customer
        Route::get('address', 'FrontEnd\Account\AddressController@index');
        Route::get('get_checkout_address', 'FrontEnd\Account\AddressController@getCheckoutAddress');
        Route::get('customer_info', 'FrontEnd\Account\AccountController@getCustomer');
        Route::get('wishlist', 'FrontEnd\Account\WishlistController@index');
        // Front End API
        Route::get('getTest', 'FrontEnd\TestController@getTest');
        Route::get('show/{id}', 'FrontEnd\TestController@getShow');
        Route::put('update', 'FrontEnd\TestController@UpdateApi');
        // =====Store
        Route::get('store/getStoreData', 'FrontEnd\Store\StoreController@index');
        /*|Api Request Header--*/
        Route::get('header','FrontEnd\Common\HeaderController@index');
        /*--| Api Request Slide--*/
        Route::get('slide','FrontEnd\Includes\SlideController@index');
        /*--| Api Request Product--*/
        Route::resource('category','FrontEnd\Product\CategoryController');
        Route::get('latest','FrontEnd\Product\LastestController@index');
        Route::get('bestSeller','FrontEnd\Product\BestSellerController@index');
        Route::get('recommandProduct','FrontEnd\Product\RecommandController@index');
        Route::get('product_detail/{product_id}/{category_id}','FrontEnd\Product\ProductController@index');
        Route::get('banner','FrontEnd\Design\BannerController@index');
        Route::get('product_cart', 'FrontEnd\Product\CartController@ProductCart');
        Route::get('getLocations/{country_id?}', 'Backend\commons\CommonsController@getLocations');
        Route::get('getShipping/{id?}', 'Backend\commons\CommonsController@getShipping');
        Route::get('get_product/{num}', 'FrontEnd\Product\ProductController@GetProduct');
        Route::get('footer', 'FrontEnd\Common\FooterController@getFooter');
        //Information
        Route::get('information/{id}', 'FrontEnd\Information\InformationController@index');
    });

    Route::group(['middleware' => 'guest:api'], function () {
        Route::post('login', 'Auth\LoginController@login');
        Route::post('register', 'Auth\RegisterController@register');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    });
