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

// Front comments
Route::post('/comment/store/{model}/{post_id}', 'CommentController@storeComment');

// Front product
Route::get('/products', 'ProductController@all');
Route::get('/product/{id}', 'ProductController@show');
Route::post('/product/add/{id}', 'ProductController@addToCard');

// Front cart
Route::get('/cart', 'CartController@show');

// Admin main
Route::get('/admin', 'AdminMainController@all');
//Route::get('/admin', 'AdminMainController@all')->middleware('auth');

// Admin products
//Route::get('/admin/products', 'AdminProductController@all');
Route::get('/admin/product/add', 'AdminProductController@add');
Route::get('/admin/product/edit/{id?}', 'AdminProductController@edit');
Route::post('/admin/product/store/main/{id?}', 'AdminProductController@storeMain');
Route::post('/admin/product/store/price/{id?}', 'AdminProductController@storePrice');
//Route::post('/admin/product/store/image', 'AdminProductController@storeImage');

// Admin posts
Route::get('/admin/posts', 'AdminPostController@allPosts');
Route::get('/admin/post/edit/{id}', 'AdminPostController@editPost');
Route::get('/admin/post/delete/{id}', 'AdminPostController@deletePost');
Route::post('/admin/post/store/{id?}', 'AdminPostController@storePost');
Route::get('/admin/post/add', 'AdminPostController@addPost');

// Admin categories
Route::get('/admin/categories', 'AdminCategoryController@allCategories');
Route::post('/admin/category/add/{id}', 'AdminCategoryController@addCategory');
Route::get('/admin/category/delete/{id}', 'AdminCategoryController@deleteCategory');
Route::post('/admin/category/store/{id?}', 'AdminCategoryController@storeCategory');
ROute::get('/admin/category/edit/{id}', 'AdminCategoryController@editCategory');

// Admin images
Route::get('/admin/images', 'AdminImageController@allImages');
Route::get('/admin/image/delete/{id}', 'AdminImageController@deleteImage');
Route::get('/admin/image/edit/{id}', 'AdminImageController@editImage');

// Admin comments
//Route::get('/admin/comments', 'AdminCommentController@allComments');
Route::get('/admin/comment/delete/{id}', 'AdminCommentController@deleteComment');
Route::get('/admin/comment/edit/{id}', 'AdminCommentController@editComment');
Route::post('/admin/{model}/{model_id}/comment/store/{id?}', 'AdminCommentController@storeComment');
Route::get('/admin/comment/reply/{id}', 'AdminCommentController@replyComment');
Route::get('/admin/{model}/{id}/comment/add', 'AdminCommentController@addComment');

// Cron test route
//Route::get('/pars/news', 'ParsNewsController@pars');

// Compress image
Route::post('/admin/compress/image', 'AdminImageCompress@compress');

// Admin users
//Route::get('admin/users', 'UserController@allUsers');

// Admin settings
Route::get('/admin/settings', 'AdminSettingController@all');
Route::post('/admin/setting/store/main', 'AdminSettingController@storeMain');
Route::post('/admin/setting/store/image', 'AdminSettingController@storeImage');

// Auth routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
