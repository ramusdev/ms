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

// Admin posts route
Route::get('/admin/posts', 'PostController@allPosts');
Route::get('/admin/post/edit/{id}', 'PostController@editPost');
Route::get('/admin/post/delete/{id}', 'PostController@deletePost');
Route::post('/admin/post/store/{id?}', 'PostController@storeAction');
Route::get('/admin/post/add', 'PostController@addPost');

// Show all images
Route::get('/images', 'ImageController@indexAction');
Route::get('/image/delete/{id}', 'ImageController@deleteAction');

// Auth user routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
