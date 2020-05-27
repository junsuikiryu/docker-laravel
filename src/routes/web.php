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
// Route::match(['get', 'post'],'hoge/form', 'QueryController@signin');
// Route::get('members/signin_complete', 'QueryController@signin_complete');
