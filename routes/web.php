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

Route::get('/', function (Request $request) {
    $instance = new App\Http\Controllers\Login($request);
    return $instance->showLogin($request);
});

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

//显示管理员角色列表
Route::get('admin/adminRoleList', function (Request $request) {
    $instance = new App\Http\Controllers\Admin($request);
    return $instance->adminRoleList($request);
});

//角色授权
Route::get('permission/showAuthAdminPermission', function (Request $request) {
    $instance = new App\Http\Controllers\Admin($request);
    return $instance->showAuthPermission($request);
});

//角色授权
Route::get('permission/adminPermissionList', function (Request $request) {
    $instance = new App\Http\Controllers\Admin($request);
    return $instance->adminPermissionList($request);
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

//显示添加权限
Route::get('permission/showAddPermission', function (Request $request) {
    $instance = new App\Http\Controllers\Permission($request);
    return $instance->showAddPermission($request);
});

//执行添加权限
Route::post('permission/add', function (Request $request) {
    $instance = new App\Http\Controllers\Permission($request);
    return $instance->doAddPermission($request);
});

//权限列表
Route::get('permission/list', function (Request $request) {
    $instance = new App\Http\Controllers\Permission($request);
    return $instance->permissionList($request);
});

//显示文章类别列表
Route::get('article/showAddArticleKind', function (Request $request) {
    $instance = new App\Http\Controllers\Article($request);
    return $instance->showAddArticleKind($request);
});

//添加文章类别
Route::post('article/addArticleKind', function (Request $request) {
    $instance = new App\Http\Controllers\Article($request);
    return $instance->addArticleKind($request);
});

//文章类别列表
Route::get('article/articleKindList', function (Request $request) {
    $instance = new App\Http\Controllers\Article($request);
    return $instance->getKindList($request);
});

//文章类别列表
Route::get('article/articleKindDetail', function (Request $request) {
    $instance = new App\Http\Controllers\Article($request);
    return $instance->getKindDetail($request);
});

//更新文章类别
Route::post('article/updateArticleKind', function (Request $request) {
    $instance = new App\Http\Controllers\Article($request);
    return $instance->updateKind($request);
});

