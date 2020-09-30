<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\models\NavModel;
use Illuminate\Http\Request;

class ParticularsController extends Controller
{
    public function particulars(){
        $navdata = NavModel::where('is_del',1)->get()->toArray();
        return view('index/particulars',['navdata'=>$navdata]);
    }

    public function seckilling(){
        $navdata = NavModel::where('is_del',1)->get()->toArray();
        return view('index/seckilling',['navdata'=>$navdata]);
    }
}
