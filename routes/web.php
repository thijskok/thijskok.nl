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

Auth::routes();

Route::feeds();

Route::get('/', 'PagesController@index')->name('home');
Route::get('/{page}', 'PagesController@show')->name('page');

Route::resource('pages', 'PagesController');

Route::resource('posts', 'PostsController', ['except' => ['index']]);
Route::resource('tag.posts', 'TagPostsController', ['only' => ['index']]);

Route::post('upload', 'AttachmentsController@upload')->name('upload');
