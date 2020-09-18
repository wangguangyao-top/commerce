<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * 后台首页
     */
    public function index(){
    	//渲染首页视图
    	return view('admin.index');
    }
}
