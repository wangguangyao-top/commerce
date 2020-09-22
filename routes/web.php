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
     * 商品表
     */
    Route::any('/goods/goodsEdit','admin\GoodsController@goods');
    Route::any('/goods/goodsShow','admin\GoodsController@goodsShow');
    Route::any('/goods/goodsDel','admin\GoodsController@goodsDel');
    Route::any('/goods/goodsUpdate','admin\GoodsController@goodsUpdate');
    Route::any('/goods/update','admin\GoodsController@update');
    Route::any('/goodsImg/uploader','admin\GoodsController@goodsImg');

    /**
	 * 分类管理
	 */
	Route::prefix('category')->group(function(){
		//分类展示
		Route::any('/','admin\CategoryController@getShow');
		//分类添加
		Route::any('create','admin\CategoryController@cate');
        Route::any('createDel','admin\CategoryController@createDel');
        Route::any('ClassShow','admin\CategoryController@ClassShow');
        Route::any('ClassUpdate','admin\CategoryController@ClassUpdate');
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
        //品牌添加
        Route::get('/create','admin\BrandController@create');
        //执行添加
        Route::any('/store','admin\BrandController@store');
        //执行删除
        Route::any('/Fdel','admin\BrandController@Fdel');
        Route::any('/addimg','admin\BrandController@addimg');
        //修改
        Route::any('edit/{brand_id}','admin\BrandController@edit');
        //执行修改
        Route::any('update','admin\BrandController@update');
        //验证品牌名称
        Route::any("brand_name","admin\BrandController@brand_name");
    });

    /**
     * 友情链接管理
     */
    Route::prefix('foot')->group(function(){
        //列表展示
        Route::get('list','admin\FootController@index');
        //友情链接添加
        Route::any('create','admin\FootController@create');
        //执行添加
        Route::any('store','admin\FootController@store');
        //修改
        Route::get('edit/{id}','admin\FootController@edit');
        // 执行修改
        Route::any('update','admin\FootController@update');
        //执行删除
        Route::post('Fdel','admin\FootController@Fdel');
    });

     /* 商品属性名称管理
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

    /**
     * SKU管理
     */
    Route::prefix('sku')->group(function(){
        //商品属性展示
        Route::get('/','admin\SkuController@index');
        //商品属性添加
        Route::get('add','admin\SkuController@create');
        //商品属性执行添加
        Route::any('store/{id}','admin\SkuController@store');
        //商品属性修改页面
        Route::get('edit/{id}','admin\SkuController@edit');
        //商品属性执行修改
        Route::post('update/{id}','admin\SkuController@update');
        //商品属性删除
        Route::get('destroy/{id}','admin\SkuController@destroy');
        Route::any('addSku','admin\SkuController@addSku');
    });

    /**
     * 用户管理
     */
    Route::any('user/user_add','admin\UserController@user_add');
    Route::any('user/user_show','admin\UserController@user_show');
    Route::any('user/user_del','admin\UserController@user_del');

    /**
     * 友情链接管理
     */
    Route::prefix('foot')->group(function(){
        //列表展示
        Route::get('list','admin\FootController@index');
        //友情链接添加
        Route::any('create','admin\FootController@create');
        //执行添加
        Route::any('store','admin\FootController@store');
        //修改
        Route::get('edit/{id}','admin\FootController@edit');
        // 执行修改
        Route::any('update','admin\FootController@update');
        //执行删除
        Route::post('Fdel','admin\FootController@Fdel');
    });
});
