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
//home
Route::get('/','HomeController@home');
Route::get('home','HomeController@home');
Route::get('home/about','HomeController@about');
Route::post('home/comments/store','CommentsController@store');
Route::get('home/search','HomeController@search');
Route::get('home/posts/category/{cate_id}','HomeController@category');
Route::get('home/posts/show/{post_id}','HomeController@posts');
//setup
Route::get('setup','AdminController@setup');
Route::post('_setup','AdminController@_setup');
Route::get('admin/login','UsersController@login');
Route::post('admin/_login','UsersController@_login');
Route::get('admin/logout','UsersController@logout');
Route::get('admin/account','UsersController@edit');
Route::get('admin','AdminController@home');
Route::get('admin/noti/comments','AdminController@comment');
Route::get('admin/options','AdminController@options');
Route::post('admin/_options','AdminController@_options');
//Route::get('admin/media','AdminController@media');
Route::get('images/{filename}', function ($filename)
{
    return Storage::get('images/'.$filename);
});
//post
Route::get('admin/posts','PostsController@index');
Route::get('admin/posts/create','PostsController@create');
Route::post('admin/posts/store','PostsController@store');
Route::get('admin/posts/show/{post_id}','PostsController@show');
Route::get('admin/posts/status/{post_status}','PostsController@status');
Route::get('admin/posts/category/{post_category}','PostsController@category');
Route::get('admin/posts/edit/{post_id}','PostsController@edit');
Route::put('admin/posts/update/{post_id}','PostsController@update');
Route::get('admin/posts/delete/{post_id}','PostsController@destroy');
// Categories Routes
Route::get('admin/categories', 'CategoriesController@index')->name('categories.index');
Route::get('admin/categories/create', 'CategoriesController@create')->name('categories.create');
Route::post('admin/categories/store', 'CategoriesController@store');
Route::get('admin/categories/show/{cate_id}', 'CategoriesController@show');
Route::get('admin/categories/edit/{cate_id}', 'CategoriesController@edit');
Route::put('admin/categories/update/{cate_id}', 'CategoriesController@update');
Route::get('admin/categories/delete/{cate_id}', 'CategoriesController@destroy');



// Comments Routes
Route::get('admin/comments', 'CommentsController@index')->name('comments.index');
Route::get('admin/comments/status/{comm_status}', 'CommentsController@status');
Route::get('admin/comments/create', 'CommentsController@create')->name('comments.create');
Route::post('admin/comments/store', 'CommentsController@store');
Route::get('admin/comments/show/{comm_id}', 'CommentsController@show');
//Route::get('admin/comments/edit/{comm_id}', 'CommentsController@edit');
Route::put('admin/comments/update/{comm_id}', 'CommentsController@update');
Route::get('admin/comments/delete/{comm_id}', 'CommentsController@destroy');



// Options Routes
/*Route::get('admin/options', 'OptionsController@index')->name('options.index');
Route::get('admin/options/create', 'OptionsController@create')->name('options.create');
Route::post('admin/options/store', 'OptionsController@store');
Route::get('admin/options/show/{opt_id}', 'OptionsController@show');
Route::get('admin/options/edit/{opt_id}', 'OptionsController@edit');
Route::put('admin/options/update/{opt_id}', 'OptionsController@update');
*/
//Route::get('admin/options/delete/{opt_id}', 'OptionsController@destroy');

// Users Routes
Route::get('admin/users', 'UsersController@index')->name('users.index');
Route::get('admin/users/create', 'UsersController@create')->name('users.create');
Route::post('admin/users/store', 'UsersController@store');
Route::get('admin/users/show/{user_id}', 'UsersController@show');
Route::get('admin/users/edit/{user_id}', 'UsersController@edit');
Route::put('admin/users/update/{user_id}', 'UsersController@update');
Route::get('admin/users/delete/{user_id}', 'UsersController@destroy');

