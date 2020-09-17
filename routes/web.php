<?php


Route::get('/', function () {
    return view('welcome');
});

//前台商品
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

    /**
     * 友情链接管理
     */
    Route::prefix('foot')->group(function(){
        //列表展示
        Route::get('/list','admin\FootController@index');
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
