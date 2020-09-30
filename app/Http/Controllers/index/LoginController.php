<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
//引入用户model
use App\models\IndexUserModel;


class LoginController extends Controller
{
    public function login(){
        return view('index.login');
    }

    public function loginDo(){
        //接值
        $user=request()->all();
        //判断验证
        if(empty($user['user_name']) || empty($user['user_pwd'])){
            return json_encode(['status'=>'40001','msg'=>'用户名/手机号或密码不可为空，请填写。'],JSON_UNESCAPED_UNICODE);
        }

        //where条件
        $where=[
            ['is_del','=',1]
        ];
        //手机号正则
        $tel_reg='/^1[3456789]\d{9}$/';
        //验证正则
        if(preg_match($tel_reg,$user['user_name'])){
            //手机号拼接where条件
            $where[]=[
                'user_tel','=',$user['user_name']
            ];
        }else{
            //用户名拼接where条件
            $where[]=[
                'user_name','=',$user['user_name']
            ];
        }
        //查询单条数据
        $user_data=IndexUserModel::where($where)->first();
        //判断用户名是否正确
        if(!empty($user_data)){
            //用户名正确 验证密码
            if($user['user_pwd']==decrypt($user_data->user_pwd)){
                //用户信息存入session
                $user=json_encode(['user_id'=>$user_data->user_id, 'user_name'=>$user_data->user_name],JSON_UNESCAPED_UNICODE);
                $user=json_decode($user,true);
                session(['user'=>$user]);
                //进入主页
                return json_encode(['status'=>'200','msg'=>'登录成功。'],JSON_UNESCAPED_UNICODE);
            }else{
                return json_encode(['status'=>'40003','msg'=>'用户名/手机号或密码错误，请重新填写。'],JSON_UNESCAPED_UNICODE);
            }
        }else{
            return json_encode(['status'=>'40002','msg'=>'用户名/手机号或密码错误，请重新填写。'],JSON_UNESCAPED_UNICODE);
        }
    }
}
