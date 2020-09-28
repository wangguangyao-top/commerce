<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(){
        return view('index.getOrderInfo');
    }
    public function paysuccess(){
        return view('index.paysuccess');
    }
     public function payfail(){
       return view('index.payfail');
    }
}
