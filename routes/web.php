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

Route::group(['prefix' => 'admin'], function() {
    Route::group(['middleware' => ['auth', 'admin']], function() {
        //Manage users:    
        Route::get('/user/create', 'AdminUserController@create')->name('admin-user-create');
        Route::post('/user/create', 'AdminUserController@store')->name('form-admin-user-create');
        Route::get('/user/view', 'AdminUserController@show')->name('admin-user-view');
        Route::get('/user/edit/{id}', 'AdminUserController@edit')->name('admin-user-edit');
        Route::post('/user/edit/{id}', 'AdminDepositController@update')->name('form-admin-user-edit');
        Route::get('/user/delete/{id}', 'AdminUserController@destroy')->name('admin-user-delete');
        Route::get('/user/search}', 'AdminUserController@search')->name('admin-user-search');

        //Manage deposit: 
        Route::get('/deposit/view', 'AdminDepositController@show')->name('admin-deposit-view');
        Route::get('/deposit/edit/{id}', 'AdminDepositController@edit')->name('admin-deposit-edit');
        Route::post('/deposit/edit/{id}', 'AdminDepositController@update')->name('form-admin-deposit-edit');
        Route::get('/deposit/delete/{id}', 'AdminDepositController@destroy')->name('admin-deposit-delete');
        Route::get('/deposit/run', 'AdminDepositController@runAccruals')->name('admin-deposit-run');
    });
});

Route::group(['prefix' => 'user'], function() {
    Route::group(['middleware' => ['auth', 'user']], function() {
        //Main user page:
        Route::get('/home', 'HomeController@index')->name('home');
        //Deposit:
        Route::get('/deposit/create', 'DepositController@create')->name('deposit-create');
        Route::post('/deposit/create', 'DepositController@store')->name('form-deposit-create');
        Route::get('/deposit/view', 'DepositController@show')->name('deposit-view');
        //History page:
        Route::get('/account/edit/{id}', 'AccountController@edit')->name('account-refill');
        Route::post('/account/refill/{id}', 'AccountController@refill')->name('form-account-refill');
        Route::post('/account/withdraw/{id}', 'AccountController@withdraw')->name('form-account-withdraw');
        Route::get('/account/view', 'AccountController@show')->name('account-history');
        //Settings page:
        Route::get('/settings/edit/{id}', 'SettingsController@edit')->name('user-settings');
        Route::post('/settings/edit/nickname/{id}', 'SettingsController@updateNickname')->name('form-user-edit-nickname');
        Route::post('/settings/edit/pass/{id}', 'SettingsController@updatePass')->name('form-user-edit-pass');
        //Team page:
        Route::get('/team/view', 'TeamController@show')->name('team-view');
    });
});

