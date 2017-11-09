<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/admin/users' , 'AdminUserController');

Route::resource('/admin/posts' , 'AdminPostController');

Route::resource('/admin/categories' , 'AdminCategoryController');

Route::resource('/admin/media','AdminMediaController');

Route::resource('/admin/comment','AdminCommentController');

Route::resource('/admin/comment/reply','AdminCommentReplyController');

Route::get('post/{id}' , 'AdminPostController@post');

Route::get('post/{id}' , ['as' => 'home.post' , 'uses' => 'AdminPostController@post']);

Route::post('comment/reply' , 'AdminCommentReplyController@createReply');