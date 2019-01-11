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

// Main
//Route::get('/', function () {
    //return view('welcome');
//});

// Admin posts
Route::get('/admin/posts', 'PostController@allPosts');
Route::get('/admin/post/edit/{id}', 'PostController@editPost');
Route::get('/admin/post/delete/{id}', 'PostController@deletePost');
Route::post('/admin/post/store/{id?}', 'PostController@storePost');
Route::get('/admin/post/add', 'PostController@addPost');

// Admin images
Route::get('/admin/images', 'ImageController@allImages');
Route::get('/admin/image/delete/{id}', 'ImageController@deleteImage');

// Admin settings
//Route::get('/admin/settings', 'SettingsController@editSettings');

// Auth user routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
