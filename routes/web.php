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


 /*    ========    frontend site   =======    */

Route::get('/','homeController@index');
Route::get('/home', 'homeController@index');
Route::get('/category/{category_name}/{category_id}', 'homeController@show_by_category');
Route::get('/brands/{manufacture_name}/{manufacture_id}', 'homeController@show_by_manufacture');
Route::get('/view-product/{product_id}', 'homeController@view_product');

 /*   ===========  cart route  ================   */
Route::post('/add-cart', 'cartController@add_cart');
Route::get('/show-cart', 'cartController@show_cart');
Route::get('/delete-cart/{rowId}', 'cartController@delete_cart');
Route::post('/cart-update', 'cartController@cart_update');


	/*   checkout route and customer route  */
Route::get('/login-or-registration', 'checkoutController@login_registration');
Route::get('/checkout', 'checkoutController@checkout');
Route::post('/save-shipping', 'checkoutController@save_shipping');
Route::get('/payment', 'checkoutController@payment');
Route::post('/payment-process', 'checkoutController@payment_process');
Route::get('/order-complete', 'checkoutController@order_complete');

Route::post('/customer-login', 'customerController@customer_login');
Route::get('/customer-logout', 'customerController@customer_logout');
Route::post('/customer-reg-process', 'customerController@customer_reg_process');







/*   =============     backend routes      ============   */

Route::get('/dashboard', 'superAdminController@index');
Route::get('/logout', 'superAdminController@logout');

Route::get('/admin-login', 'adminController@index');
Route::post('/login_process', 'adminController@login_process');


     /*======= cateory route ==========*/

Route::get('/add-category', 'categoryController@index');
Route::post('/add_category_process', 'categoryController@add_category_process');
Route::get('/all-category', 'categoryController@all_category');
Route::get('/category_unactive/{cateory_id}', 'categoryController@category_unactive');
Route::get('/category_active/{cateory_id}', 'categoryController@category_active');
Route::get('/category-update/{cateory_id}', 'categoryController@category_update');
Route::post('/category-update-process/{cateory_id}', 'categoryController@cat_update_process');
Route::get('/delete-category/{cateory_id}', 'categoryController@delete_category'); 


	/*====== manufacture route =======*/
Route::get('/add-manufacture', 'manufactureController@index');
Route::post('/save-manufacture', 'manufactureController@save_manufacture');
Route::get('/all-manufacture', 'manufactureController@all_manufacture');
Route::get('/manufacture_unactive/{manufacture_id}', 'manufactureController@manufacture_unactive');
Route::get('/manufacture_active/{manufacture_id}', 'manufactureController@manufacture_active');
Route::get('/manufacture-update/{manufacture_id}', 'manufactureController@manufacture_update');
Route::post('/manu-update-process/{manufacture_id}', 'manufactureController@manu_update_process');
Route::get('/delete-manufacture/{manufacture_id}', 'manufactureController@delete_manufacture');



		/*======  product route ======*/
Route::get('/add-product', 'productController@index');
Route::post('/save-product', 'productController@save_product');
Route::get('/all-product', 'productController@all_product');
Route::get('/product-unactive/{product_id}', 'productController@product_unactive');
Route::get('/product-active/{product_id}', 'productController@product_active');
Route::get('/product-update/{product_id}', 'productController@product_update');
Route::post('/product-update-process/{product_id}', 'productController@pro_update_process');
Route::get('/delete-product/{product_id}', 'productController@delete_product');



		/*=======   slider route =========*/
Route::get('/add-slider', 'sliderController@index');
Route::post('/save-slider', 'sliderController@save_slider');
Route::get('/all-slider', 'sliderController@all_slider');
Route::get('/slider-unactive/{slider_id}', 'sliderController@slider_unactive');
Route::get('/slider-active/{slider_id}', 'sliderController@slider_active');
Route::get('/delete-slider/{slider_id}', 'sliderController@delete_slider');


	/*   order route   */
Route::get('/manage-order', 'orderController@manage_order');
Route::get('/view-order/{view_order}', 'orderController@view_order');






