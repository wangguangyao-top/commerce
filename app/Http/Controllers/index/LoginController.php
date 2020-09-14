<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;


class LoginController extends Controller
{
   public function login(){
       return view('index.login');
   }
}
