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

use \Illuminate\Http\Request;
Route::get('/index', function (Request $request) {
    $instance = new App\Http\Controllers\Index($request);
    return $instance->index($request);
});

Route::get('login', function (Request $request) {
    $instance = new App\Http\Controllers\Login($request);
    return $instance->showLogin();
});

Route::post('doLogin', function (Request $request) {
    $instance = new App\Http\Controllers\Login($request);
    return $instance->doLogin($request);
});

//展示添加管理员页面
Route::get('showAddAdmin', function (Request $request) {
    $instance = new App\Http\Controllers\Admin($request);
    return $instance->showAddAdmin();
});

//添加管理员
Route::post('doAddAdmin', function (Request $request) {
    $instance = new App\Http\Controllers\Admin($request);
    $instance->doAddAdmin($request);
});

//获取文章类型列表
Route::get('article/getArticleKind', function (Request $request) {
    $instance = new App\Http\Controllers\Article($request);
    $instance->getKindList($request);
});

//显示添加文章页面
Route::get('article/showAddArticle', function (Request $request) {
    $instance = new App\Http\Controllers\Article($request);
    return $instance->showAddArticle($request);
});

//添加文章
Route::post('article/addArticle', function (Request $request) {
    $instance = new App\Http\Controllers\Article($request);
    $instance->addArticle($request);
});
