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

//前台注册
Route::any('/register','index\RegisterController@register');



/**
 * 商品后台管理系统
 */
Route::prefix('admin')->group(function(){
	Route::get('index','admin\IndexController@index');//后台首页
	Route::get('category','admin\CategoryController@cate');//分类
});
