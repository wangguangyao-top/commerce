<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParticularsController extends Controller
{
    public function particulars(){
        return view('index/particulars');
    }

    public function seckilling(){
        return view('index/seckilling');
    }
}
