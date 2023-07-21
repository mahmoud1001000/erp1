<?php
Route::get('/repair-status', 'Modules\Repair\Http\Controllers\CustomerRepairStatusController@index')->name('repair-status');
Route::post('/post-repair-status', 'Modules\Repair\Http\Controllers\CustomerRepairStatusController@postRepairStatus')->name('post-repair-status');
Route::group(['middleware' => ['web', 'authh', 'auth', 'SetSessionData', 'language', 'timezone', 'AdminSidebarMenu'], 'prefix' => 'repair', 'namespace' => 'Modules\Repair\Http\Controllers'], function () {
    Route::get('edit-repair/{id}/status', 'RepairController@editRepairStatus');
    Route::post('update-repair-status', 'RepairController@updateRepairStatus');
    Route::get('delete-media/{id}', 'RepairController@deleteMedia');
    Route::get('print-label/{id}', 'RepairController@printLabel');
    Route::resource('/repair', 'RepairController')->except(['create', 'edit']);
    Route::resource('/status', 'RepairStatusController', ['except' => ['show']]);
    Route::resource('/guarantee', 'GuaranteeController');
    Route::any('/guarantee/get_products_sold', 'GuaranteeController@get_products_sold');
    Route::any('/guarantee/get_invoice_sold', 'GuaranteeController@get_invoice_sold');
    Route::any('/guarantee/get_supplier', 'GuaranteeController@get_supplier');
    Route::get('guarantee/{id}/status', 'GuaranteeController@editStatus');
    Route::put('guarantee-update/{id}/status', 'GuaranteeController@updateStatus');
        Route::get('guarantee/print_slim/{id}', 'GuaranteeController@print_slim');

    Route::resource('/repair-settings', 'RepairSettingsController', ['only' => ['index', 'store']]);

    Route::get('/install', 'InstallController@index');
    Route::post('/install', 'InstallController@install');
    Route::get('/install/uninstall', 'InstallController@uninstall');
    Route::get('/install/update', 'InstallController@update');

    Route::get('get-device-models', 'DeviceModelController@getDeviceModels');
    Route::get('models-repair-checklist', 'DeviceModelController@getRepairChecklists');
    Route::resource('device-models', 'DeviceModelController')->except(['show']);
    Route::resource('dashboard', 'DashboardController');
    
    Route::get('job-sheet/delete/{id}/image', 'JobSheetController@deleteJobSheetImage');
    Route::get('job-sheet/{id}/status', 'JobSheetController@editStatus');
    Route::put('job-sheet-update/{id}/status', 'JobSheetController@updateStatus');
    Route::resource('job-sheet', 'JobSheetController');
    Route::get('job-sheet/print_slim/{id}', 'JobSheetController@print_slim');

});

