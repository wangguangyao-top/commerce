<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\NavModel;

class IndexController extends Controller
{
    public function index(){
        $navdata = NavModel::where('is_del',1)->get();
        // dd($navdata);
        //compact 引入变量
        return view('index/index',compact('navdata'));
    }

}
