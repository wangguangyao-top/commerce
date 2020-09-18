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
     * 品牌管理
     */
    Route::prefix('brand')->group(function(){
        //品牌展示
        Route::get('/','admin\BrandController@index');
    });
});
