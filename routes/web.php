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
Route::get('/','HomeController@home');
Route::get('setup','AdminController@setup');
Route::post('_setup','AdminController@_setup');
Route::get('admin/login','UsersController@login');
Route::post('admin/_login','UsersController@_login');
Route::get('admin/logout','UsersController@logout');
Route::get('admin','AdminController@home');