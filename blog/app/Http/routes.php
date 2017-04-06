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

/*Route::get('/', function () {
    return view('welcome');
});

Route::any('admin/login','Admin\LoginController@login');
Route::get('admin/code','Admin\LoginController@code');

Route::any('admin/index','Admin\IndexController@index');
Route::any('admin/info','Admin\IndexController@info');*/

/*Route::get('admin/getcode','Admin\LoginController@getcode');*/

/*Route::group(['middleware'=>['web']],function (){
    Route::any('admin/login','Admin\LoginController@login');
    Route::any('admin/code','Admin\LoginController@code');
});*/

Route::group(['middleware' => ['web']], function () {
    /*Route::get('/', 'Home\IndexController@index');*/
    Route::any('admin/login', 'Admin\LoginController@login');
    Route::get('admin/code', 'Admin\LoginController@code');
});

/*
Route::get('admin/index','Admin\IndexController@index');
Route::get('admin/info','Admin\IndexController@info');
Route::get('admin/quit','Admin\LoginController@quit');*/

Route::group(['middleware' => ['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function () {
    Route::get('index','IndexController@index');
    Route::get('info','IndexController@info');
    Route::get('quit','LoginController@quit');
    Route::any('pass','IndexController@pass');
    Route::any('cate/changeorder','CategoryController@changeorder');

    Route::resource('category','CategoryController');
});


