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
Route::get('users', 'Api\UserController@index');
Route::get('users/exportFile', 'Api\UserController@exportFile');
//->name('user.index')->name('user.export-file')

