<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|  resource
*/

Route::middleware(['web',  'SetSessionData', 'auth', 'language', 'timezone', 'AdminSidebarMenu'])
    ->prefix('partners')->group(function() {
    Route::get('/install', 'InstallController@index');
    Route::post('/install', 'InstallController@install');
    Route::get('/install/uninstall', 'InstallController@uninstall');
    Route::get('/install/update', 'InstallController@update');

    /*Partners routes  */
    Route::resource('/partners', 'PartnersController');
    Route::resource('/payments', 'PaymentsController');
    Route::get('/getpayments', 'PaymentsController@getpayments');

    Route::get('/partners_set', 'PartnersController@partners_set');


    Route::resource('/assets','AssetsController');
    Route::resource('/finalaccount','FinalAccountController');
    Route::post('/distribution/{id}','FinalAccountController@distribution');

    Route::get('/business','BusinessController@index');
    Route::get('/get','BusinessController@gettotal');
    Route::post('/savecapital','BusinessController@savecapital');


});

