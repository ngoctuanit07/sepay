<?php
/**
 * Route front
 */
if(sc_config('Sepay')) {
Route::group(
    [
        'prefix'    => 'plugin/payment/sepay_basic',
        'namespace' => 'App\Plugins\Payment\Sepay\Controllers',
    ],
    function () {
        Route::get('index', 'FrontController@index')
        ->name('sepay_basic.index');
        Route::post('process-form', 'FrontController@processForm')
        ->name('sepay_basic.process_form');
        Route::get('process', 'FrontController@processResponse')
        ->name('sepay_basic.process');
    }
    
);
}