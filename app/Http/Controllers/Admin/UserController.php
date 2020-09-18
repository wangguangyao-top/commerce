<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\slideModel;
use Illuminate\Http\Request;
use App\models\UserModel;

class UserController extends Controller
{
//    public function user_add(){
//        return view('admin.user.user_show');
//    }
    public function user_add(Request $request){
        $ta = $request->except('_token');
        $data = [
            "user_name"=>$ta['user_name'],
            "user_pwd"=>md5($ta['user_pwd']),
            "add_time"=>time(),
        ];
        $res = UserModel::insert($data);
        if($res){
            return Redirect("admin/user/user_show");
        }
    }
    public function user_del(Request $request){
        $user_id = $request->all();
//        dd($slide_id);
        $res =UserModel::where("user_id",$user_id)->update(['is_del'=>2]);
        if($res){
            return $message = [
                "code"=>00002,
                "message"=>"删除成功",
                "success"=>true,
            ];
        }
    }
    //展示
    public function user_show(){
        $res = UserModel::where("is_del",1)->paginate(2);
//        print_r($res);die;
        return view("admin.user.user_show",['res'=>$res]);
    }
//    //修改
//    public function user_upd($id){
//        return view('admin.user.user_upd');
//    }
//    public function user_upddo($id){
//        $data = request()->all();
//        $res = UserModel::where("user_id",$id)->update($data);
////        print_r($res);die;
////        状态码未修改是0，修改了是0
//        if($res){
//            return Redirect("admin/user/user_show");
//        }
//        if($res==0){
//            return Redirect("admin/user/user_show");
//        }
//
//
//    }
}
