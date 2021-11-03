<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('loginForm', function () {
    return view('login');
});
Route::get('users', 'Api\UserController@index');
Route::get('users/exportFile', 'Api\UserController@exportFile');

//->name('user.index')->name('user.export-file')

