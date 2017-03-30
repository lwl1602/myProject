<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});

//多请求路由 get post等都可以
Route::any('multy2',function(){
    return 'multy2';
});

Route::any('wechat/service',['uses'=>'ServiceController@service']);
Route::any('wechat/servicecontent/index',['uses'=>'ServiceController@contentindex']);
Route::any('wechat/servicecontent/menu',['uses'=>'ServiceController@servicemenu']);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::any('welcome','MemberController@info');
    Route::any('welcome','MemberController@info');
});


