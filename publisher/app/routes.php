<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('before' => 'auth', 'uses' => 'HomeController@showWelcome'));

//项目
Route::get('projects/index', array('before' => 'auth', 'uses' => 'ProjectsController@allProjects'));
Route::any('projects/add'  , array('before' => 'auth', 'uses' => 'ProjectsController@editProject'));
Route::any('projects/edit' , array('before' => 'auth', 'uses' => 'ProjectsController@editProject'));
Route::get('projects/publish',array('before' => 'auth', 'uses' => 'ProjectsController@publish'));
Route::get('projects/srclog',array('before' => 'auth', 'uses' => 'ProjectsController@getSrclog'));
Route::post('projects/dopublish',array('before' => 'auth', 'uses' => 'ProjectsController@dopublish'));
Route::post('projects/querystatus',array('before' => 'auth', 'uses' => 'ProjectsController@queryStatus'));
//服务器
Route::any('servers/add',array('before' => 'auth', 'uses' => 'ServersController@editServer'));
Route::any('servers/edit',array('before' => 'auth', 'uses' => 'ServersController@editServer'));
Route::get('servers/ping',array('before' => 'auth', 'uses' => 'ServersController@pingServer'));

//用户
Route::get('users/index',array('before' => 'auth', 'uses' => 'UsersController@all'));
Route::any('users/edit',array('before' => 'auth', 'uses' => 'UsersController@edit'));
Route::any('users/add',array('before' => 'auth', 'uses' => 'UsersController@edit'));
Route::any('users/password',array('before' => 'auth', 'uses' => 'UsersController@changepwd'));
//登入登出
Route::any('login','HomeController@login');
Route::get('logout',function(){
	Auth::logout();
    Session::flush();
	return Redirect::guest('login');
});

//各种测试
Route::get('passwd/test',function(){
    return  Hash::make('admin');
});
