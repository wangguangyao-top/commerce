<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PayController extends Controller
{
    public function payfail(){
       return view('index.payfail');
    }
}