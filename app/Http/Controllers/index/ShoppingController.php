<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\models\NavModel;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function shopping(){
        $navdata = NavModel::where('is_del',1)->get()->toArray();
        return view('index/shopping',['navdata'=>$navdata]);
    }
}
