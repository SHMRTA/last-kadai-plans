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

/*
//ユーザの個別詳細処理
Route::get('users', 'UserController@create');
//ユーザの個別詳細処理
Route::get('users/{id}', 'UserController@show');
//ユーザの新規登録処理
Route::post('users', 'UserController@store');
//ユーザの更新処理
Route::put('users/{id}', 'UserController@update');
//ユーザの削除
Route::delete('usesr/{id}', 'UserController@destroy');
*/


//トップページを表示するルーティング
Route::get('/','UserController@index');       

//登録されたユーザ一覧表示のルーティング
Route::get('users/list', 'UserController@list')->name('user_list');

//登録された予定表示のルーティング
Route::get('plans', 'PlansController@list')->name('plan_list');     

//予定登録ページ表示のルーティング
Route::get('plans/create', 'PlansController@create')->name('plan.create');
//Route::get('/', 'PlansController@create')->name('plan.create');

//予定を登録する為のルーティング
Route::post('plans','PlansController@store')->name('plan.store');


//登録した予定を反映する為のルーティング
//Route::get('plans/{id}','PlansController@show')->name('plan.show');

//showの補助ページ
//Route::post('plans','PlansController@index');




//ユーザ登録
Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup','Auth\RegisterController@register')->name('signup.post');

//認証
Route::get('login','Auth\LoginController@showLoginForm')->name('login');    
Route::post('login','Auth\LoginController@login')->name('login.post');
Route::get('logout','Auth\LoginController@logout')->name('logout.get');

