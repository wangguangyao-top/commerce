<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\RolepermissionModel;
use App\models\RoleModel;
use App\models\PerssionModel;
class RolepermissionController extends Controller
{
    public function rpadd(Request $request){
        # 接受用户id

        $arr = RoleModel::where("is_del",1)->get();
//        dd($arr);
        $all = PerssionModel::where("is_del",1)->get();
        return view('admin.rolepermission.create',['arr'=>$arr,'all'=>$all]);
    }
    public function rpdoadd(Request $request)
    {
        $arr = $request->all();
//        var_dump($arr);die;
        $role_id = $arr['role_id'];
        $p_id = $arr['p_id'];


        $arr_str  = '';
        foreach ( $p_id as $v ){
            $arr_str .= $v.',';
        }

        $data = [];
        $data['role_id'] = $role_id;
        $data['p_id'] = $arr_str;
        $data['add_time'] = time();
        $data['is_del']=1;
        $bol = RolepermissionModel::insert($data);
        if ($bol) {
            $returnDate = [];

            $returnDate['success'] = true;
            $returnDate['url'] = "";
            $returnDate['msg'] = "";
            echo json_encode($returnDate);
            die;
        } else {
            $returnDate = [];
            $returnDate['success'] = false;
            $returnDate['url'] = '';
            $returnDate['msg'] = "系统出现问题";
            echo json_encode($returnDate);
            die;
        }
    }
        public function rpshow(){
            $admin_role = RolepermissionModel::where('is_del',1)->get();
            foreach($admin_role as $v){
                $v->role_id=RoleModel::where('role_id',$v->role_id)->value('role_name');
                $v->p_id = trim($v->p_id,',');
                $v->p_id = explode(',',$v->p_id);
                $per= PerssionModel::whereIn('p_id',$v->p_id)->select(['p_name'])->get();
                $v->p_id =$per;
            }
            return view('/admin/rolepermission/show',['role_data'=>$admin_role]);
        }
        public function edit(Request $request){
            $arr = RoleModel::where("is_del",1)->get();
            $all = PerssionModel::where("is_del",1)->get();
            $id=$request->id;
            $info=RolepermissionModel::where('id',$id)->first();
            $info->p_id = trim($info->p_id,',');
            $info->p_id = explode(',',$info->p_id);
            $per= PerssionModel::whereIn('p_id',$info->p_id)->select(['p_id'])->get();
            foreach ($per as $v1) {
                $arr2[]=$v1->p_id;
            }
            $info->p_id=$arr2;
            return view('/admin/rolepermission/UpEdit',['arr'=>$arr,'all'=>$all,'info'=>$info]);
        }
        public function edit2(Request $request){
            $data=$request->all();
            $p_id=$data['p_id'];
            $p_id2='';
            foreach ($p_id as $v) {
                $p_id2.=$v.',';
            }
            $id=$request->id;
            $data2=$request->except('id');
            $data2['p_id']=$p_id2;
            $per=new RolepermissionModel;
            $up=$per::where('id',$id)->update($data2);
            if($up!==false){
                return ['code'=>200,'msg'=>'OK','data'=>[]];
            }else{
                return ['code'=>1000,'msg'=>'NO','data'=>[]];
            }
        }
        public function del(Request $request){
            $id=$request->id;
            $per=new RolepermissionModel;
            $del=$per::where('id',$id)->update(['is_del'=>2]);
            if($del){
                return ['code'=>200,'msg'=>'OK','data'=>[]];
            }else{
                return ['code'=>1000,'msg'=>'NO','data'=>[]];
            }
        }
}
