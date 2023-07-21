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

Route::middleware(['web',  'SetSessionData', 'auth', 'language', 'timezone', 'AdminSidebarMenu'])->prefix('installment')->group(function() {
    Route::get('/', 'InstallmentController@index');
    Route::get('/install', 'InstallController@index');
    Route::post('/install', 'InstallController@install');
    Route::get('/install/uninstall', 'InstallController@uninstall');
    Route::get('/install/update', 'InstallController@update');


    Route::resource('/installment','InstallmentController');

    Route::get('/installments','InstallmentController@instalments');
    Route::get('/installmentdelete/{id}','InstallmentController@installmentdelete');
    Route::get('/paymentdelete/{id}','InstallmentController@paymentdelete');
    Route::get('/addpayment/{id}','InstallmentController@addpayment');
    Route::post('/storepayment','InstallmentController@storepayment');
    Route::get('/business','InstallmentController@business');

    Route::get('/printinstallment/{id}','InstallmentController@printinstallment');



    Route::resource('/system','InstallmentSystemController');
    Route::get('/getsystemdata','InstallmentSystemController@getsystemdata');






    Route::resource('/customer','CustomerController');
    Route::get('/getcustomerdata/{id}','CustomerController@getcustomerdata');

    Route::get('/createinstallment2/{id}/{total}/{paid?}','CustomerController@createinstallment2');
    Route::post('/createinstallment','CustomerController@createinstallment');
    Route::get('/getinstallment','CustomerController@getinstallment');
    Route::get('/contacts','CustomerController@contacts');
    Route::get('/contactwithinstallment','CustomerController@contactwithinstallment');


    Route::get('/sells','SellController@index');










});

/*
ALTER TABLE `ultimatepos`.`transactions`
CHANGE COLUMN `payment_status` `payment_status` ENUM('paid', 'due', 'partial', 'installmented') CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL ;

*/