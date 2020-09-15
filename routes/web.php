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
//Main page
Route::get('/', function () {
    return view('welcome');
});

//Authorization
Auth::routes();

//Shop
Route::group(['middleware' => 'auth'], function() {
    Route::get('/shop/view', 'SiteController@show')->name('shop-view');
    Route::get('/catalog/view/{id}', 'CatalogController@show')->name('catalog-view');
});

Route::group(['prefix' => 'admin'], function() {
    Route::group(['middleware' => ['auth', 'admin']], function() {
        //Manage users:    
        Route::get('/user/create', 'AdminUserController@create')->name('admin-user-create');
        Route::post('/user/create', 'AdminUserController@store')->name('form-admin-user-create');
        Route::get('/user/view', 'AdminUserController@show')->name('admin-user-view');
        Route::get('/user/edit/{id}', 'AdminUserController@edit')->name('admin-user-edit');
        Route::post('/user/edit/{id}', 'AdminUserController@update')->name('form-admin-user-edit');
        Route::get('/user/delete/{id}', 'AdminUserController@destroy')->name('admin-user-delete');
        Route::get('/user/search}', 'AdminUserController@search')->name('admin-user-search');

        //Manage categories: 
        Route::get('/category/create', 'AdminCategoryController@create')->name('admin-category-create');
        Route::post('/category/create', 'AdminCategoryController@store')->name('form-admin-category-create');
        Route::get('/category/view', 'AdminCategoryController@show')->name('admin-category-view');
        Route::get('/category/edit/{id}', 'AdminCategoryController@edit')->name('admin-category-edit');
        Route::post('/category/edit/{id}', 'AdminCategoryController@update')->name('form-admin-category-edit');
        Route::get('/category/delete/{id}', 'AdminCategoryController@destroy')->name('admin-category-delete');
        //Manage products: 
        Route::get('/product/create', 'AdminProductController@create')->name('admin-product-create');
        Route::post('/product/create', 'AdminProductController@store')->name('form-admin-product-create');

        //Manage products: 
        Route::get('/product/create', 'AdminProductController@create')->name('admin-product-create');
        Route::post('/product/create', 'AdminProductController@store')->name('form-admin-product-create');
        Route::get('/product/view', 'AdminProductController@show')->name('admin-product-view');
        Route::get('/product/edit/{id}', 'AdminProductController@edit')->name('admin-product-edit');
        Route::post('/product/edit/{id}', 'AdminProductController@update')->name('form-admin-product-edit');
        Route::get('/product/delete/{id}', 'AdminProductController@destroy')->name('admin-product-delete');

        //Manage orders: 
        Route::get('/order/view', 'AdminOrderController@show')->name('admin-order-view');
    });
});

Route::group(['prefix' => 'user'], function() {
    Route::group(['middleware' => ['auth', 'user']], function() {
        //Main user page:
        Route::get('/home', 'HomeController@index')->name('home');

        //Settings page:
        Route::get('/settings/edit/{id}', 'SettingsController@edit')->name('user-settings');
        Route::post('/settings/edit/nickname/{id}', 'SettingsController@updateNickname')->name('form-user-edit-nickname');
        Route::post('/settings/edit/pass/{id}', 'SettingsController@updatePass')->name('form-user-edit-pass');

        //Cart:
        Route::post('/cart/{id}', 'CartController@addToCart')->name('cart-store');
        Route::get('/cart', 'CartController@view')->name('cart-view');
        Route::post('/cart/update/{id}', 'CartController@update')->name('cart-update');
        Route::get('/cart/remove/{id}', 'CartController@remove')->name('cart-delete');

        //Order:
        Route::get('/order/checkout', 'OrdersController@create')->name('order-create');
        Route::post('/order/checkout', 'OrdersController@store')->name('form-order-create');
    });
});

