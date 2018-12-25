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

// Post
Route::get('/post-add', 'PostController@addIndex');
Route::post('/post-add/add', 'PostController@addAction');
Route::get('/post-edit/{id}', 'PostController@editIndex');
Route::post('/post-edit/edit', 'PostController@editAction');
Route::get('/post-all/delete/{id}', 'PostController@deleteAction');
//Route::get('/post-all', 'PostController@allAction');
Route::get('/', 'PostController@allIndex');

// Admin
//Route::get('/admin-area', 'AdminController@postsAll');
//Route::get('/admin-area/delete/{id}', 'AdminController@postDelete');
//Route::post('/admin-area/delete', 'AdminController@postDelete');
//Route::get('/admin-area/edit', 'AdminController@editIndex');
//Route::post('/admin-area/edit/action', 'AdminController@editAction')

// Auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
