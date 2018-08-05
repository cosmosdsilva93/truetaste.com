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

/*-------------- Home: Routes ----------------*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact-us', 'HomeController@contactUs');
Route::post('/send-message', 'HomeController@getMessage');
Route::get('/menu', 'HomeController@menu');
Route::get('/add-to-cart', 'HomeController@addToCart');
Route::get('/payment-success', 'HomeController@paymentSuccess');
Route::get('/payment-failed', 'HomeController@paymentFail')->name('payment_failed');
Route::get('/get-cart', 'HomeController@getCart');
Route::get('/about-us', 'HomeController@aboutUs');
Route::get('/events', 'HomeController@events');
Route::post('/save-order-details', 'HomeController@checkout');
Route::get('/auth-login/{service}', 'HomeController@authLogin');
Route::get('/auth-callback/{service}', 'HomeController@authCallback');
Route::get('/logout', 'HomeController@logout');


/*-------------- Admin: Routes ----------------*/

Route::get('/admin', 'AdminController@showLogin')->name('login');
Route::get('/admin/login', 'AdminController@login');
Route::get('/admin/logout', 'AdminController@logout');
Route::get('/admin/orders', 'AdminController@showOrders');
Route::get('/admin/menu', 'AdminController@showMenu')->name('menu');
Route::get('/admin/menu/add', 'AdminController@addMenu')->name('add_menu');
Route::get('/admin/menu/save', 'AdminController@saveMenu');
Route::get('/admin/menu/edit/{item}', 'AdminController@editMenu')->name('edit_menu');
Route::get('/admin/menu/delete/{item}', 'AdminController@deleteMenu');
Route::get('/admin/queries', 'AdminController@showQueries');



