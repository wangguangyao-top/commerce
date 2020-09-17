<?php


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('index')->group(function () {
    Route::any('/', 'index\IndexController@index');
    Route::any('/list', 'index\ListController@list');
    Route::any('/GoodsSeckilling', 'index\ParticularsController@seckilling');
    Route::any('/GoodsParticulars', 'index\ParticularsController@particulars');
    Route::any('/shopping', 'index\ShoppingController@shopping');
    Route::any('/cooperation', 'index\CooperationController@cooperation');
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
		Route::get('index','admin\CategoryController@index');
		//分类添加
		Route::get('create','admin\CategoryController@create');
		//执行添加
		Route::post('store','admin\CategoryController@store');
	});
    /**
     * 轮播图管理
     */
    Route::any('slide/slide_add','admin\SlideController@slide_add');
    Route::any('slide/slide_img','admin\SlideController@addimg');
    Route::any('slide/slide_show','admin\SlideController@slide_show');
    Route::any('slide/slide_del','admin\SlideController@slide_del');
    Route::any('slide/slide_upd/{id}','admin\SlideController@slide_upd');
    Route::any('slide/slide_upddo','admin\SlideController@slide_upddo');

    /**
     * 品牌管理
     */
    Route::prefix('brand')->group(function(){
        //品牌展示
        Route::get('/','admin\BrandController@index');
    });

    /**
     * 商品属性名称管理
     */
    Route::prefix('attr')->group(function(){
        //商品属性名称展示
        Route::get('/','admin\AttrController@index');
        //商品属性名称添加页面
        Route::get('add','admin\AttrController@create');
        //执行添加
        Route::post('store','admin\AttrController@store');
        //修改页面
        Route::get('edit/{id}','admin\AttrController@edit');
        //执行修改
        Route::post('update/{id}','admin\AttrController@update');
        //执行删除
        Route::get('destroy/{id}','admin\AttrController@destroy');
    });
    /**
     * 用户管理
     */
    Route::any('user/user_add','admin\UserController@user_add');
    Route::any('user/user_show','admin\UserController@user_show');
    Route::any('user/user_del','admin\UserController@user_del');

});
