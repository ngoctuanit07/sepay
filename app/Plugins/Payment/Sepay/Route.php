<?php
/**
 * Route front
 */
if(sc_config('Sepay')) {
Route::group(
    [
        'prefix'    => 'plugin/payment/sepay',
        'namespace' => 'App\Plugins\Payment\Sepay\Controllers',
    ],
    function () {
        Route::get('index', 'FrontController@index')
        ->name('sepay.index');
        Route::get('sepayqr', 'FrontController@sepayqr')
        ->name('sepay.sepayqr');
        Route::post('process-form', 'FrontController@processForm')
        ->name('sepay.process_form');
        Route::get('process', 'FrontController@processResponse')
        ->name('sepay.process');
    }
    
);
}