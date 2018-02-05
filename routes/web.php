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



Route::group(['middleware' => 'auth'], function (){

    ///////CATEGORY//////
    Route::get('categories', [
       'uses' => 'CategoryController@index',
       'as'   => 'categories'
    ]);
    Route::post('category/store', [
        'uses' => 'CategoryController@store',
        'as'   => 'category.store'
    ]);
    Route::get('category/edit/{id}', [
        'uses' => 'CategoryController@edit',
        'as'   => 'category.edit'
    ]);
    Route::post('category/update/{id}', [
        'uses' => 'CategoryController@update',
        'as'   => 'category.update'
    ]);
    Route::get('category/delete/{id}', [
        'uses' => 'CategoryController@destroy',
        'as'   => 'category.delete'
    ]);

    ///////TAG///////
    Route::get('tags', [
       'uses' => 'TagController@index',
       'as'   => 'tags'
    ]);
    Route::post('tag/store', [
       'uses' => 'TagController@store',
       'as'   => 'tag.store'
    ]);
    Route::get('tag/edit/{id}', [
        'uses' => 'TagController@edit',
        'as'   => 'tag.edit'
    ]);
    Route::post('tag/update/{id}', [
        'uses' => 'TagController@update',
        'as'   => 'tag.update'
    ]);
    Route::get('tag/delete/{id}', [
        'uses' => 'TagController@destroy',
        'as'   => 'tag.delete'
    ]);

    ///////PAGES//////
    Route::get('/', [
        'uses' => 'PagesController@index',
        'as'   => 'index'
    ]);
    Route::get('/contact', [
        'uses' => 'PagesController@contact',
        'as'   => 'contact'
    ]);
    Route::post('/contact', [
        'uses' => 'PagesController@postContact'
    ]);
    Route::get('/about', [
        'uses' => 'PagesController@about',
        'as'   => 'about'
    ]);

    ////////POSTS////////
    Route::get('/posts', [
        'uses' => 'PostController@index',
        'as'   => 'posts'
    ]);
    Route::get('/post/create', [
        'uses' => 'PostController@create',
        'as'   => 'post.create'
    ]);
    Route::post('/post/store', [
        'uses' => 'PostController@store',
        'as'   => 'post.store'
    ]);
    Route::get('/post/show/{id}', [
        'uses' => 'PostController@show',
        'as'   => 'post.show'
    ]);
    Route::get('/post/edit/{id}', [
        'uses' => 'PostController@edit',
        'as'   => 'post.edit'
    ]);
    Route::post('/post/update/{id}', [
        'uses' => 'PostController@update',
        'as'   => 'post.update'
    ]);
    Route::get('/post/delete/{id}', [
        'uses' => 'PostController@destroy',
        'as'   => 'post.delete'
    ]);

    ////////COMMENTS//////
    Route::post('post/show/{post_id}', [
       'uses' => 'CommentController@store',
       'as'   => 'comments.store'
    ]);
    Route::get('comment/edit/{id}', [
        'uses' => 'CommentController@edit',
        'as'   => 'comment.edit'
    ]);
    Route::post('comment/update/{id}', [
        'uses' => 'CommentController@update',
        'as'   => 'comment.update'
    ]);
    Route::get('comment/delete/{id}', [
        'uses' => 'CommentController@delete',
        'as'   => 'comment.delete'
    ]);
    Route::get('comment/destroy/{id}', [
        'uses' => 'CommentController@destroy',
        'as'   => 'comment.destroy'
    ]);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
