<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CooperationController extends Controller
{
    public function cooperation(){
        return view('index/cooperation');
    }
}
