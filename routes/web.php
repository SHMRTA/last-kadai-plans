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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

//登録されたユーザ一覧を表示
Route::get('users/list', 'UserController@list')->name('user_list');

//index:showの補助ページ
Route::get('/','UserController@index');
//Route::get('user', 'UserController@index');

//ユーザの個別詳細処理
Route::get('users', 'UserController@create')->name('user_create');

//ユーザの個別詳細処理
Route::get('users/{id}', 'UserController@show');

//ユーザの新規登録処理
Route::post('users', 'UserController@store');

//ユーザの更新処理
Route::put('users/{id}', 'UserController@update');

//ユーザの削除
Route::delete('usesr/{id}', 'UserController@destroy');



Route::get('/','UserController@index');
//Route::resource('plans','UserController');
//Route::get('plans/create','UserController@create')->name('create.user');

//ユーザ登録
Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup','Auth\RegisterController@register')->name('signup.post');

//認証
Route::get('login','Auth\LoginController@showLoginForm')->name('login');    
Route::post('login','Auth\LoginController@login')->name('login.post');
Route::get('logout','Auth\LoginController@logout')->name('logout.get');

