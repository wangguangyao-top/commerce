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

<<<<<<< HEAD
//前台注册
Route::any('/register','index\RegisterController@register');

//后台首页
=======


/**
 * 商品后台管理系统
 */
Route::prefix('admin')->group(function(){
	Route::get('index','admin\IndexController@index');
});
>>>>>>> 3e4089c1c884e68fdbd1299d4aed154cbe2d0973
