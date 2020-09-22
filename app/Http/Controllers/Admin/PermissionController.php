<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\PerssionModel;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function per_add(){
        return view('admin.permission.create');
    }
    public function per_adddo(){
        $res  =request()->all();
        $data = [
            'p_name'=>isset($res['p_name']) ? $res['p_name'] : '',
            'p_node'=>isset($res['p_node']) ? $res['p_node'] : '',
            "add_time"=>time(),
        ];
        $res = PerssionModel::insert($data);
        // dd($res);
        if($res){
            return json_encode(['success'=>true]);
        }
    }
    public function per_show(){
        $res = PerssionModel::where("is_del",1)->paginate(2);
        return view("admin.permission.index",['data'=>$res]);
    }
    public function per_del(Request $request){
        $p_id = $request->all();
        $res = PerssionModel::where("p_id",$p_id)->update(['is_del'=>2]);
        if($res){
            return $message = [
                "code"=>00002,
                "message"=>"删除成功",
                "success"=>true,
            ];
        }
    }
    // 修改
    public function per_upd($id){
        $res = PerssionModel::where('p_id',$id)->first();

        return view("admin.permission.update",['res'=>$res]);
    }
    public function per_upddo(){
        $id= request()->p_id;
        $ta = request()->all();
//        print_r($ta);die;
        $data = [
            'p_name'=>$ta['p_name'],
            'p_node'=>$ta['p_node'],
            "add_time"=>time(),
        ];

        $res =PerssionModel::where("p_id",$id)->update($data);
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
