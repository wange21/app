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

//后台登陆界面路由
Route::get('/manage/login', 'manage\loginController@login');
Route::post('/manage/doLogin', 'manage\loginController@doLogin');

/**
 * 后台管理路由组
 */
Route::group(['prefix' => 'manage', 'namespace' => 'manage', 'middleware' => 'manage'], function () {
    Route::get('/', 'indexController@index');
    Route::get('/index', 'indexController@index');
    Route::get('/user', 'userController@index');
    Route::get('/head', 'userController@head');
    Route::get('/logo', 'appController@logo');
    Route::get('/userDel', 'userController@userDel');
    Route::any('/userEdit', 'userController@userEdit');
    Route::post('/headUpload', 'userController@headUpload');
    Route::any('/group', 'groupController@index');
    Route::get('/groupDel', 'groupController@groupDel');
    Route::any('/app', 'appController@index');
    Route::any('/appDel', 'appController@appDel');
    Route::any('/excel', 'excelController@index');

    Route::get('/comment-form-net', 'commentController@index');

    Route::post('/getData', 'commentController@getData');
    Route::post('/save-comment', 'commentController@saveComment');

    Route::get('/addwords', 'wordController@index');
});