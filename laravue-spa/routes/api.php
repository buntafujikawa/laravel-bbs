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

Route::group(['middleware' => 'api'], function () {
    Route::post('authenticate', 'AuthenticateController@authenticate');

    // 認証済みユーザーのみ
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::resource('tasks', 'TaskController');
        Route::get('me', 'AuthenticateController@getCurrentUser');

        Route::get('logout', 'AuthenticateController@logout')->middleware('jwt.refresh');
    });
});
