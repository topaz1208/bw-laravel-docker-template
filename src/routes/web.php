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

Route::get('/todo', function () {
    echo 'Hello World!';
}); //section6 todoページにルートを定義

Route::get('/todo', 'TodoController@index'); //Section7 TodoControllerのindexメソッドを実行
Route::get('/todo/create', 'TodoController@create'); // Section11　新規作成画面のルート
Route::get('/todo/create', 'TodoController@create')->name('todo.create'); // Section12 追記
