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
Route::post('/post-edit/edit/{id}', 'PostController@editAction');
Route::get('/post-all/delete/{id}', 'PostController@deleteAction');
Route::get('/', 'PostController@allIndex');

// Show all images
Route::get('/images', 'ImageController@indexAction');
Route::get('/image/delete/{id}', 'ImageController@deleteAction');

// Auth user routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
