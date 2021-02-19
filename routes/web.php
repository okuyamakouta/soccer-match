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
//新規登録
Route::get('新規登録', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('新規登録', 'Auth\RegisterController@register')->name('signup.post');
//ログイン
Route::get('ログイン', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('ログイン', 'Auth\LoginController@login')->name('login.post');
Route::get('ログアウト', 'Auth\LoginController@logout')->name('logout.get');