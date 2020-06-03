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

Route::get('/', function () {
    return view('top');
});

Route::get('/thread', function () {
    return view('thread');
});
Route::post('/thread', 'CommentController@add_comment');

Route::get('/delete_thread', function () {
    return view('/delete_thread');
});
Route::post('/delete_thread', 'ThreadController@delete_thread');

Route::get('/create_thread', function () {
    return view('create_thread');
});
Route::post('/create_thread', 'ThreadController@create_thread');
