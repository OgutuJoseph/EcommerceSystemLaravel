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

//Frontend site............
Route::get('/','App\Http\Controllers\HomeController@index');

//show category & manufacture wise product here
Route::get('/product_by_category/{category_id}','App\Http\Controllers\HomeController@show_product_by_category');
Route::get('/product_by_manufacture/{manufacture_id}','App\Http\Controllers\HomeController@show_product_by_manufacture');
Route::get('/view_product/{product_id}','App\Http\Controllers\HomeController@product_details_by_id');

//Cart routes
Route::post('/add-to-cart','App\Http\Controllers\CartController@add_to_cart');
Route::get('/show-cart','App\Http\Controllers\CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','App\Http\Controllers\CartController@delete_to_cart');
Route::post('/update-cart','App\Http\Controllers\CartController@update_cart');

//Checkout routes are here... 
Route::get('/login-check','App\Http\Controllers\CheckoutController@login_check');
Route::get('/new-login-check','App\Http\Controllers\CheckoutController@new_login_check');
Route::post('/customer-registration','App\Http\Controllers\CheckoutController@customer_registration');
Route::get('/checkout','App\Http\Controllers\CheckoutController@checkout');
Route::post('/save-shipping-details','App\Http\Controllers\CheckoutController@save_shipping_details');

//Customer login and logout........ 
Route::post('/customer-login','App\Http\Controllers\CheckoutController@customer_login');
Route::get('/customer-logout','App\Http\Controllers\CheckoutController@customer_logout');

//Payment routes.... 
Route::get('/payment','App\Http\Controllers\CheckoutController@payment');
Route::post('/order-place','App\Http\Controllers\CheckoutController@place_order');


//Service Section
Route::get('/online-help','App\Http\Controllers\HomeController@online_help');
Route::get('/contact','App\Http\Controllers\HomeController@contact_us');
Route::get('/faq','App\Http\Controllers\HomeController@faqs');

//QuickShop Section
Route::get('/mens','App\Http\Controllers\HomeController@mens');
Route::get('/womens','App\Http\Controllers\HomeController@womens');
Route::get('/electronics','App\Http\Controllers\HomeController@electronics');
Route::get('/furniture','App\Http\Controllers\HomeController@furniture');

//Policies Section
Route::get('/terms-of-use','App\Http\Controllers\HomeController@terms_of_use');
Route::get('/privacy-policy','App\Http\Controllers\HomeController@privacy_policy');
Route::get('/refund-policy','App\Http\Controllers\HomeController@refund_policy');
Route::get('/billing-system','App\Http\Controllers\HomeController@billing_system');

//About Section
Route::get('/company-information','App\Http\Controllers\HomeController@company_information');
Route::get('/careers','App\Http\Controllers\HomeController@careers');
Route::get('/store-location','App\Http\Controllers\HomeController@store_location');
Route::get('/copyright','App\Http\Controllers\HomeController@copyright');



/*************************** */
//Backend routes........
Route::get('logout','App\Http\Controllers\SuperAdminController@logout');
Route::get('/admin', 'App\Http\Controllers\AdminController@index');
Route::get('/dashboard','App\Http\Controllers\SuperAdminController@index');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');


//Category related routes.....
Route::get('/add-category','App\Http\Controllers\CategoryController@index');
Route::get('/all-category','App\Http\Controllers\CategoryController@all_category');
Route::post('/save-category','App\Http\Controllers\CategoryController@save_category');
Route::get('/edit-category/{category_id}','App\Http\Controllers\CategoryController@edit_category');
Route::post('/update-category/{category_id}','App\Http\Controllers\CategoryController@update_category');
Route::get('/delete-category/{category_id}','App\Http\Controllers\CategoryController@delete_category');
Route::get('/inactive_category/{category_id}','App\Http\Controllers\CategoryController@inactive_category');
Route::get('/active_category/{category_id}','App\Http\Controllers\CategoryController@active_category');

//Manufacture or Brand related routes....... 
Route::get('/add-manufacture','App\Http\Controllers\ManufactureController@index');
Route::get('/all-manufacture','App\Http\Controllers\ManufactureController@all_manufacture');
Route::post('/save-manufacture','App\Http\Controllers\ManufactureController@save_manufacture');
Route::get('/edit-manufacture/{manufacture_id}','App\Http\Controllers\ManufactureController@edit_manufacture');
Route::post('/update-manufacture/{manufacture_id}','App\Http\Controllers\ManufactureController@update_manufacture');
Route::get('/delete-manufacture/{manufacture_id}','App\Http\Controllers\ManufactureController@delete_manufacture');
Route::get('/inactive_manufacture/{manufacture_id}','App\Http\Controllers\ManufactureController@inactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}','App\Http\Controllers\ManufactureController@active_manufacture');

//Product related routes....... 
Route::get('/add-product','App\Http\Controllers\ProductController@index');
Route::get('/all-product','App\Http\Controllers\ProductController@all_product');
Route::post('/save-product','App\Http\Controllers\ProductController@save_product'); ;
Route::get('/delete-product/{product_id}','App\Http\Controllers\ProductController@delete_product');
Route::get('/inactive_product/{product_id}','App\Http\Controllers\ProductController@inactive_product');
Route::get('/active_product/{product_id}','App\Http\Controllers\ProductController@active_product');

//Slider related routes....... 
Route::get('/add-slider','App\Http\Controllers\SliderController@index');
Route::get('/all-slider','App\Http\Controllers\SliderController@all_slider');
Route::post('/save-slider','App\Http\Controllers\SliderController@save_slider'); 
Route::get('/delete-slider/{slider_id}','App\Http\Controllers\SliderController@delete_slider');
Route::get('/inactive_slider/{slider_id}','App\Http\Controllers\SliderController@inactive_slider');
Route::get('/active_slider/{slider_id}','App\Http\Controllers\SliderController@active_slider');


//Order routes....... 
Route::get('/manage-order','App\Http\Controllers\CheckoutController@manage_order');
Route::get('/view-order/{order_id}','App\Http\Controllers\CheckoutController@view_order');
Route::get('/delete-order/{order_id}','App\Http\Controllers\CheckoutController@delete_order');
Route::get('/inactive_order/{order_id}','App\Http\Controllers\CheckoutController@inactive_order');
Route::get('/active_order/{order_id}','App\Http\Controllers\CheckoutController@active_order');
