<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\models\NavModel;
use Illuminate\Http\Request;

class CooperationController extends Controller
{
    public function cooperation(){
        $navdata = NavModel::where('is_del',1)->get()->toArray();
        return view('index/cooperation',['navdata'=>$navdata]);
    }
}
