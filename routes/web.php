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

Route::get('/', 'MyteamController@index');
//新規登録
Route::get('新規登録', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('新規登録', 'Auth\RegisterController@register')->name('signup.post');
//ログイン
Route::get('ログイン', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('ログイン', 'Auth\LoginController@login')->name('login.post');
Route::get('ログアウト', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('myteams.followings');
        Route::get('followers', 'UsersController@followers')->name('myteams.followers_users');
        
    });
    
            Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('approve', 'ApprovesController@store')->name('approves.approve');
        Route::delete('unapprove', 'ApprovesController@destroy')->name('approves.unapprove');
    });

//ユーザ詳細
Route::group(['middleware' => ['auth']], function() {
    Route::resource('myteams', 'MyteamController');
    Route::resource('users', 'UsersController', ['only' => ['index','show']]);
    }); 
});