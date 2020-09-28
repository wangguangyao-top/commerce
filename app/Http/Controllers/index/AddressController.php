<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
	// 用户收货地址
    public function create(){
    	//查询所有收货地址作为列表的数据

    	// 添加的视图
        return view('index.address');
    }

    // 执行添加
    public function store(){
    	//接收数据

    	// 入库
    } 
   
}
