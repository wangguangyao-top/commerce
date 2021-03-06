<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\ClassModel;
class CategoryController extends Controller
{
    public function cate(Request $request){
        if($request->ajax() && $request->post()){
            $data=$request->all();
            $data['is_del']=1;
            $data['add_time']=time();
            $class=new ClassModel();
            $add=$class->add($data);
            if($add){
                return ['code'=>200,'msg'=>'OK','data'=>[]];
            }else{
                return ['code'=>1000,'msg'=>'NO','data'=>[]];
            }
        }
        $class1=new ClassModel();
        $info=$class1::where('is_del',1)->get();
        $recursion=$this->getTree($info);
//        $class=$class::where('p_id',0)->get();

        return view('/admin/GoodsClass',['recursion'=>$recursion,'class2'=>$recursion]);
    }

    /**
     * @param $arr
     * @param int $pid
     * @param int $level
     * @return array
     * 无限极分类
     */
   public function getTree($arr,$pid=0,$level=0)
    {
        static $list = [];
        foreach ($arr as $key => $value) {
            if ($value["p_id"] == $pid) {
                $value["level"] = $level;
                $list[] = $value;
                unset($arr[$key]); //删除已经排好的数据为了减少遍历的次数，当然递归本身就很费神就是了
                $this->getTree($arr,$value["cate_id"],$level+1);
            }
        }
        return $list;
    }
   public function getShow(){
       $class=new ClassModel();
       $info=$class::where('is_del',1)->get();
//       $recursion=$this->getTree($info);
       return view('/admin/classShow',['info'=>$info]);
   }
   public function createDel(){
        $cate_id=request()->cate_id;
        $where=[
            ['is_del','=',1],
            ['cate_id','=',$cate_id],
        ];
       $class=new ClassModel();
       $del=$class::where($where)->update(['is_del'=>2]);
       if($del){
           return ['code'=>200,'msg'=>'OK','data'=>[]];
       }else{
           return ['code'=>1000,'msg'=>'NO','data'=>[]];
       }
   }
   public function ClassShow(){
       $cate_id=request()->cate_id;
       $where=[
           ['is_del','=',1],
           ['cate_id','=',$cate_id],
       ];
       $class=new ClassModel();
       $data=$class::where($where)->first();
       $info=$class::where('is_del',1)->get();
       $recursion=$this->getTree($info);
       return view('/admin/classUpdate',['data'=>$data,'class2'=>$recursion]);
   }
   public function ClassUpdate(){
       $cate_id=request()->cate_id;
       $all=request()->except('cate_id');
       $class=new ClassModel();
       $where=[
           ['is_del','=',1],
           ['cate_id','=',$cate_id],
       ];
       $update = $class->where($where)->update($all);
       if($update!==false){
           return ['code'=>200,'msg'=>'OK','data'=>[]];
       }else{
           return ['code'=>1000,'msg'=>'NO','data'=>[]];
       }
   }

}
