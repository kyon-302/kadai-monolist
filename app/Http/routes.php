<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

//ユーザ登録
Route::get('signup','Auth\AuthController@getRegister')->name('signup.get');
Route::post('signup','Auth\AuthController@postRegister')->name('signup.post');

//ログイン
route::get('login','Auth\AuthController@getLogin')->name('login.get');
route::post('login','Auth\AuthController@postLogin')->name('login.post');
route::get('logout','Auth\AuthController@getLogout')->name('logout.get');


Route::group(['middleware' => 'auth'], function () {
    Route::resource('items', 'ItemsController', ['only' => ['create', 'show']]);
    Route::post('want', 'ItemUserController@want')->name('item_user.want');
    Route::delete('want', 'ItemUserController@dont_want')->name('item_user.dont_want');
    Route::resource('users', 'UsersController', ['only' => ['show']]);
});

