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
Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    $instance = new App\Http\Controllers\Login();
    return $instance->showLogin();
});

Route::post('doLogin', function () {
    $instance = new App\Http\Controllers\Login();
    return $instance->doLogin();
});

//展示添加管理员页面
Route::get('showAddAdmin', function () {
    $instance = new App\Http\Controllers\Admin();
    return $instance->showAddAdmin();
});

//添加管理员
Route::post('doAddAdmin', function (Request $request) {
    $instance = new App\Http\Controllers\Admin();
    return $instance->doAddAdmin($request);
});
