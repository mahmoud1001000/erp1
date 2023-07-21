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

Route::middleware(['web',  'SetSessionData', 'auth', 'language', 'timezone', 'AdminSidebarMenu'])->prefix('restaurant')->group(function() {
    Route::get('/', 'RestaurantController@index');
    Route::get('/install', 'InstallController@index');
    Route::post('/install', 'InstallController@install');
    Route::get('/install/uninstall', 'InstallController@uninstall');
    Route::get('/install/update', 'InstallController@update');


    Route::resource('/restaurant','RestaurantController');
});
