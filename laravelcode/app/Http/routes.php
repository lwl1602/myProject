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

Route::get('admin/view', 'Admin\IndexController@view');

/*Route::get('admin/test','admin\IndexController@index');*/

/*Route::get('at',['as'=>'user',function(){
    echo route('user');
    return "<h1>路由别名</h1>";
}]);

Route::get('in',[
    'as'=>'name','uses'=>'admin\IndexController@index'
]);*/

/*prefix请求加的前缀，namespace 后面指定别名，下面的get就能省略 */
//Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
//    Route::get('test','IndexController@index');
//    Route::resource('article','ArticleController');                 /*资源路由*/
//});


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

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware' => ['web','admin.login']], function () {
    Route::get('test','IndexController@index');
    Route::resource('article','ArticleController');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware' => ['web']], function () {
    Route::get('login','IndexController@login');
});

