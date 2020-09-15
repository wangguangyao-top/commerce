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
Route::prefix('index')->group(function () {
    Route::any('/','index\IndexController@index');
    Route::any('/list','index\ListController@list');
    Route::any('/GoodsSeckilling','index\ParticularsController@seckilling');
    Route::any('/GoodsParticulars','index\ParticularsController@particulars');
    Route::any('/shopping','index\ShoppingController@shopping');
    Route::any('/cooperation','index\CooperationController@cooperation');
});
