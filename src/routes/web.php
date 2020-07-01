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

Route::get('/home', function () {
    return view('top');
});

Route::get('/top', function () {
    return view('top');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/thread', function () {
    return view('thread');
});
Route::post('/thread', 'CommentController@add_comment');

Route::get('/delete_thread', 'ThreadController@check_auth_delete_thread');
Route::post('/delete_thread', 'ThreadController@delete_thread');

Route::get('/create_thread', 'ThreadController@check_auth_create_thread');
Route::post('/create_thread', 'ThreadController@create_thread');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/android_top', 'AndroidController@get_thread_list');
Route::get('/android_top', 'AndroidController@get_thread_list');

Route::post('/android_thread', 'AndroidController@get_comment_list');
Route::get('/android_thread', 'AndroidController@get_comment_list');
// Route::post('/android_thread', 'AndroidController@add_comment');
