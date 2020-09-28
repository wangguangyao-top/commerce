<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\models\NavModel;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(){
        $navdata = NavModel::where('is_del',1)->get()->toArray();
        return view('index.register',['navdata'=>$navdata]);
    }
}
