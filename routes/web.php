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

// Front posts
Route::get('/posts', 'PostController@allPosts');
Route::get('/post/{id}', 'PostController@showPost');

// Front images
Route::get('/images', 'ImageController@allImages');
Route::get('/image/{id}', 'ImageController@showImage');

// Comments
Route::post('/comment/store/{model}/{post_id}', 'CommentController@storeComment');
Route::post('/comment/store/reply/{model}/{post_id}', 'CommentController@storeReplyComment');

// Admin posts
Route::get('/admin/posts', 'AdminPostController@allPosts');
Route::get('/admin/post/edit/{id}', 'AdminPostController@editPost');
Route::get('/admin/post/delete/{id}', 'AdminPostController@deletePost');
Route::post('/admin/post/store/{id?}', 'AdminPostController@storePost');
Route::get('/admin/post/add', 'AdminPostController@addPost');

// Admin categories
Route::get('/admin/categories', 'CategoryController@allCategories');
Route::post('/admin/category/add/{id}', 'CategoryController@addCategory');
Route::get('/admin/category/delete/{id}', 'CategoryController@deleteCategory');
Route::post('/admin/category/store/{id?}', 'CategoryController@storeCategory');
ROute::get('/admin/category/edit/{id}', 'CategoryController@editCategory');

// Admin images
Route::get('/admin/images', 'AdminImageController@allImages');
Route::get('/admin/image/delete/{id}', 'AdminImageController@deleteImage');

// Admin comments
Route::get('/admin/comments', 'AdminCommentController@allComments');
Route::get('/admin/comment/delete/{id}', 'AdminCommentController@deleteComment');
Route::get('/admin/comment/edit/{id}', 'AdminCommentController@editComment');
Route::post('/admin/comment/store/{id?}', 'AdminCommentController@storeComment');

// Admin users
//Route::get('admin/users', 'UserController@allUsers');

// Admin settings
//Route::get('/admin/settings', 'SettingsController@editSettings');

// Auth user routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
