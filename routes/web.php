<?php

use Illuminate\Support\Facades\Route;

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
Route::get('loginForm', function () {
    return view('login');
});
Route::post('summitUrl','Api\UserController@loginForm');
Route::post('auth','Api\UserController@auth');
Route::post('register','Api\UserController@register');
Route::get('list','Api\UserController@list')->middleware('jwt.auth');
Route::post('changePassword','Api\UserController@changePassword');
