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
//前台
Route::get('index/login','index\LoginController@login');

//前台注册
Route::any('/register','index\RegisterController@register');


/**
 * 商品后台管理系统
 */
Route::prefix('admin')->group(function(){
	//后台首页
	Route::get('index','admin\IndexController@index');
	//后台登录
	Route::get('login','admin\LoginController@login');

	/**
	 * 分类管理
	 */
	Route::prefix('category')->group(function(){
		//分类展示
		Route::get('/','admin\CategoryController@index');
		//分类添加
		Route::get('create','admin\CategoryController@cate');
		//执行添加
		Route::post('store','admin\CategoryController@store');
	});

    /**
     * 品牌管理
     */
    Route::prefix('brand')->group(function(){
        //品牌展示
        Route::get('/','admin\BrandController@index');
    });
});
