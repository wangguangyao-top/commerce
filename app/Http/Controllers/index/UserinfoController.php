<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserinfoController extends Controller
{
    public function show(){
        return view ('index.userinfo');
    }
    public function add(Request $request){

    }
}
