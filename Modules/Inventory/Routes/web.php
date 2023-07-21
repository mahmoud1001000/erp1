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



Route::middleware(['web',  'SetSessionData', 'auth', 'language', 'timezone', 'AdminSidebarMenu'])
    ->prefix('inventory')->group(function() {
        Route::get('/install', 'InstallController@index');
        Route::post('/install', 'InstallController@install');
        Route::get('/install/uninstall', 'InstallController@uninstall');
        Route::get('/install/update', 'InstallController@update');


        Route::resource('/inventory', 'InventoryController');
        Route::get('/stock/stocking/', 'InventoryController@stocking');
        Route::get('/stock/stock_line_save/', 'InventoryController@stock_line_save');
        Route::get('/stock/delete_stock', 'InventoryController@delete_stock');
        Route::get('/stock/changestatus', 'InventoryController@changestatus');
        Route::get('/stock/get_last_product', 'InventoryController@get_last_product');
        Route::get('/stock/getproduct', 'InventoryController@getproduct');
        Route::post('/stock/savestocking', 'InventoryController@savestocking');
        Route::get('/stock/deletstock', 'InventoryController@deletstock');



        Route::get('/stock/report', 'StocktackingController@report');
        Route::get('/stock/details_report', 'StocktackingController@details_report');



        Route::get('/stock/report_plus', 'StocktackingController@report_plus');
        Route::get('/stock/report_minus', 'StocktackingController@report_minus');



    });
