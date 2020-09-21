<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\models\UserModel;
use Illuminate\Http\Request;

class LoginController extends CommonController
{
    public function login(){
        return view('admin.login');
    }
    public function do(Request $request){
        if( $request -> ajax() && $request -> method() == 'POST' ){
            # 接收参数，去登陆
            $username = $request -> post('username')??'';
            if( empty( $username ) ){
                return $this -> fail('请输入你的账号');
            }
            $password = $request -> post('password')??'';
            if( empty( $password ) ){
                return $this -> fail('请输入你的密码');
            }

            $where = [
                ['user_name', '=', $username]
            ];

            $user_model = new UserModel();

            $admin_obj = $user_model -> where( $where ) -> first();

            if( empty( $admin_obj ) ){
                return $this -> fail('该账号不存在');
            }

//            $check =  $this -> checkAdminStatus( $admin_obj );

//            if( $check['status'] != 200 ){
//                return $check;
//            }

            # 记录成功，记录用户信息
            $request -> session() -> put('admin_info', $admin_obj -> toArray());

            return $this -> success();
        }
    }


    public function logout(){
        session(['admin'=>null]);
        request()->session()->save();
        return redirect('admin/login');
    }

}
