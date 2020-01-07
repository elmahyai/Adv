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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['admin', 'auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('admin-home', 'AdminHomeController@index')->name('admin.home');
    Route::resource('client', 'AdminUserController', ['except' => ['show']]);
    Route::post('client/{client}/restore', 'AdminUserController@restore_client')->name('restore_customer');
    Route::post('client/{client}/status', 'AdminUserController@status')->name('status_change');
    Route::post('client/{client}/renew_subscription', 'AdminUserController@renew_subscription')->name('renew_subscription');
    Route::resource('package', 'AdminPackageController', ['except' => ['show']]);
    Route::resource('screen', 'AdminScreenController');
    Route::post('screen/{screen}/status', 'AdminScreenController@status')->name('status_screen');
    Route::resource('advModel', 'AdminModelController', ['except' => ['show']]);
    Route::resource('model_class', 'AdminModelClassController', ['except' => ['show']]);
    Route::get('statistics', 'AdminStatisticsController@index')->name('admin.statistics');
    Route::post('statistics/search', 'AdminStatisticsController@search')->name('statistic.search');

});

Route::group(['middleware' => ['client', 'status', 'auth'], 'namespace' => 'Client', 'prefix' => 'client'], function () {
    Route::get('client-home', 'ClientHomeController@index')->name('client.home');
    Route::resource('advertisement', 'ClientAdvertisementController');
    Route::get('screen/{screen}/change_default_waiting', 'ClientAdvertisementController@change_default_waiting')->name('change_default_waiting');
    Route::put('screen/{screen}/change_default_waiting_url', 'ClientAdvertisementController@change_default_waiting_url')->name('change_default_waiting_url');
    Route::get('statistics', 'ClientStatisticsController@index')->name('client.statistics');
    Route::post('statistics/search', 'ClientStatisticsController@search')->name('client.statistic.search');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('lang/{locale}', 'HomeController@lang')->name('locale');
