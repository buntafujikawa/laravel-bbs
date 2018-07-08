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
Route::get('/subscribe', function () {
    return view('subscribe');
});

Route::post('charge', 'CheckoutController@charge');
Route::post('subscribe_process', 'CheckoutController@subscribe_process');
Route::post('subscribe_change', 'CheckoutController@subscribe_change');
Route::post('cancel', 'CheckoutController@subscribe_cancel');
