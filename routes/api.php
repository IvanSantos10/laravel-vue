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

Route::group(['as' => 'api.'], function () {
    Route::post('/access_token', 'Api\AuthController@accessToken');
    Route::post('/refresh_token', 'Api\AuthController@refreshToken');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('/logout', 'Api\AuthController@logout');

        Route::get('/hello-world', function (Request $request) {
            return response()->json(['massage' => 'Hello Word']);
        });

        Route::get('/user', function (Request $request) {
            $user = Auth::guard('api')->user();
            //$user = $request->user('api');
            return $user;
        });
    });
});