<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\RoleModel;
use App\models\UserModel;
use App\models\RolepermissionModel;
use App\models\AdminroleModel;

class AdminroleController extends Controller
{
    public function aadd(Request $request ,$id){
        # 接受用户id
        //dd($id);
        $admin=new AdminroleModel;
        $arr =UserModel::where(['is_del'=>1,'user_id'=>$id])->first();
        //dd($arr);
        $all =RoleModel::where('is_del',1)->get();
        $where=[
            ['is_del','=',1],
            ['user_id','=',$id]
        ];
        $obj=$admin::orderBy('add_time','desc')->where($where)->first();
        $role=[];
        if(!empty($obj)){
            $role_id=trim($obj->role_id,',');
            $role=explode(',',$role_id);
        }
        return view('admin.adminrole.create',['arr'=>$arr,'all'=>$all,'role'=>$role]);
    }
    public function adoadd(Request $request)
    {
        $arr = $request->all();
//        var_dump($arr);die;
        $user_id = $arr['user_id'];
        $role_id = $arr['role_id'];

        $arr  = '';
        foreach ( $role_id as $v ){
            $arr .= $v.',';
        }
        $data = [];
        $data['user_id'] = $user_id;
        $data['role_id'] = $arr;
        $data['is_del']=1;
        $data['add_time'] = time();
        $bol = AdminroleModel::insert($data);
        if ($bol) {
            $returnDate = [];
            $returnDate['success'] = true;
            $returnDate['url'] = "/";
            $returnDate['msg'] = "添加成功";
            return json_encode($returnDate);
        } else {
            $returnDate = [];
            $returnDate['success'] = false;
            $returnDate['url'] = '';
            $returnDate['msg'] = "系统出现问题";
            return json_encode($returnDate);
        }
    }
}
