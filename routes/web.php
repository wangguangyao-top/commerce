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
	 * 导航管理
	 */
	Route::prefix('nav')->group(function(){
		//分类展示
		Route::get('index','admin\NavController@index');
		//分类添加
		Route::get('create','admin\NavController@create');
		//执行添加
		Route::post('store','admin\NavController@store');
		//删除
		Route::post('edit','admin\NavController@edit');
		//修改
		Route::get('upda/{id}','admin\NavController@upda');
		//执行修改
		Route::any('updata','admin\NavController@updata');
	});
    /**
     * 轮播图管理
     */
    Route::any('slide/slide_add','admin\SlideController@slide_add');
    Route::any('slide/slide_show','admin\SlideController@slide_show');
    Route::any('slide/slide_del','admin\SlideController@slide_del');
    Route::any('slide/slide_upd/{id?}','admin\SlideController@slide_upd');
    Route::any('slide/slide_upddo/{id?}','admin\SlideController@slide_upddo');

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
     * 商品属性值管理
     */
    Route::prefix('attrval')->group(function(){
        //商品属性值展示
        Route::get('/','admin\AttrvalController@index');
        //商品属性值添加页面
        Route::get('add','admin\AttrvalController@create');
        //执行添加
        Route::post('store','admin\AttrvalController@store');
        //修改页面
        Route::get('edit/{id}','admin\AttrvalController@edit');
        //执行修改
        Route::post('update/{id}','admin\AttrvalController@update');
        //删除
        Route::get('destroy/{id}','admin\AttrvalController@destroy');
    });
});
