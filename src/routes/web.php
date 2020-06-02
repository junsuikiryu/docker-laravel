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
    return view('welcome');
});

Route::get('/test', function () {
  $test = "test page<br>";
  return view('test',compact('test'));
});

Route::get('/hoge/form', function () {
    return view('hoge/form');
});
Route::post('/hoge/form', 'QueryController@foobar');

Route::get('/top', function () {
    return view('top');
});
Route::get('/thread', function () {
    return view('thread');
});
Route::post('/thread', 'CommentController@add_comment');

Route::get('/delete', function () {
    return view('delete');
});
Route::post('/delete', 'ThreadController@delete_thread');

Route::get('/create', function () {
    return view('create');
});
Route::post('/create', 'ThreadController@create_thread');
