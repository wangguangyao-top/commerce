<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\RoleModel;
use App\models\slideModel;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function role_add(){
       return view('admin.role.create');
    }
    public function role_adddo(Request $request){
        $res  =request()->all();
        $data = [
            'role_name'=>$res['role_name'],
            "add_time"=>time(),
        ];
        $res = RoleModel::insert($data);
        // dd($res);
        if($res){
            return json_encode(['success'=>true]);
        }
    }
    public function role_show(){
        $res = RoleModel::where("is_del",1)->paginate(2);
        return view("admin.role.index",['data'=>$res]);
    }
    public function role_del(Request $request){
        $role_id = $request->all();
//        dd($slide_id);
        $res = RoleModel::where("role_id",$role_id)->update(['is_del'=>2]);
        if($res){
            return $message = [
                "code"=>00002,
                "message"=>"删除成功",
                "success"=>true,
            ];
        }
    }
    // 修改
    public function role_upd($id){
        $res = RoleModel::where('role_id',$id)->first();

        return view("admin.role.update",['res'=>$res]);
    }
    public function role_upddo(){
        $id= request()->role_id;
        $ta = request()->all();
//        print_r($ta);die;
        $data = [
            'role_name'=>$ta['role_name'],
            "add_time"=>time(),
        ];


        $res =RoleModel::where("role_id",$id)->update($data);
//        print_r($res);die;
//        状态码未修改是0，修改了是0
        if($res){
            return json_encode(['success'=>true]);
        }
        if($res==0){
            return json_encode(['success'=>false]);
        }

    }
}
