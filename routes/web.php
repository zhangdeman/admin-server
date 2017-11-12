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

Route::get('login', function () {
    $instance = new App\Http\Controllers\Login();
    return $instance->showLogin();
});

Route::post('doLogin', function () {
    $instance = new App\Http\Controllers\Login();
    return $instance->doLogin();
});
