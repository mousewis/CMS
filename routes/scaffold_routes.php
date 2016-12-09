<?php

// Categories Routes
Route::get('categories', 'CategoriesController@index')->name('categories.index');
Route::get('categories/create', 'CategoriesController@create')->name('categories.create');
Route::post('categories/store', 'CategoriesController@store');
Route::get('categories/show/{cate_id}', 'CategoriesController@show');
Route::get('categories/edit/{cate_id}', 'CategoriesController@edit');
Route::put('categories/update/{cate_id}', 'CategoriesController@update');
Route::get('categories/delete/{cate_id}', 'CategoriesController@destroy');



// Comments Routes
Route::get('comments', 'CommentsController@index')->name('comments.index');
Route::get('comments/create', 'CommentsController@create')->name('comments.create');
Route::post('comments/store', 'CommentsController@store');
Route::get('comments/show/{comm_id}', 'CommentsController@show');
Route::get('comments/edit/{comm_id}', 'CommentsController@edit');
Route::put('comments/update/{comm_id}', 'CommentsController@update');
Route::get('comments/delete/{comm_id}', 'CommentsController@destroy');



// Options Routes
Route::get('options', 'OptionsController@index')->name('options.index');
Route::get('options/create', 'OptionsController@create')->name('options.create');
Route::post('options/store', 'OptionsController@store');
Route::get('options/show/{opt_id}', 'OptionsController@show');
Route::get('options/edit/{opt_id}', 'OptionsController@edit');
Route::put('options/update/{opt_id}', 'OptionsController@update');
Route::get('options/delete/{opt_id}', 'OptionsController@destroy');



// Posts Routes
Route::get('posts', 'PostsController@index')->name('posts.index');
Route::get('posts/create', 'PostsController@create')->name('posts.create');
Route::post('posts/store', 'PostsController@store');
Route::get('posts/show/{post_id}', 'PostsController@show');
Route::get('posts/edit/{post_id}', 'PostsController@edit');
Route::put('posts/update/{post_id}', 'PostsController@update');
Route::get('posts/delete/{post_id}', 'PostsController@destroy');



// Users Routes
Route::get('users', 'UsersController@index')->name('users.index');
Route::get('users/create', 'UsersController@create')->name('users.create');
Route::post('users/store', 'UsersController@store');
Route::get('users/show/{user_id}', 'UsersController@show');
Route::get('users/edit/{user_id}', 'UsersController@edit');
Route::put('users/update/{user_id}', 'UsersController@update');
Route::get('users/delete/{user_id}', 'UsersController@destroy');

