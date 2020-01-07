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

Route::group(['middleware' => ['cors'],'namespace' => 'Client', 'prefix' => 'client'], function () {
    Route::get('adv/{screen_code}/send-adv', 'ClientHomeController@get_ads')->name('client.adv');
    Route::post('advertisement/{screen_code}/statistics', 'ClientAdvertisementController@advertisement_statistics')->name('advertisement_statistics');
});

