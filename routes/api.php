<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'prefix' => 'v1',
    'as' => 'api.',
    'namespace' => 'Api\V1\Admin',
    'middleware' => ['auth:api']
], function () {
    Route::apiResource('projects', 'ProjectsApiController');
});
Route::post('summitUrl','Api\UserController@loginForm');
Route::post('auth','Api\UserController@auth');
Route::post('register','Api\UserController@register');
Route::get('list','Api\UserController@list')->middleware('jwt.auth');
Route::post('changePassword','Api\UserController@changePassword');
