<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD

=======
>>>>>>> 253eb1dcf99029f1b6ffd7aa8cf8dc613dd19420
use App\models\AreaModel;
use App\models\UseraddressModel;
class AddressController extends Controller
{
	// 用户收货地址
    public function create(){
        $addressInfo=UseraddressModel::where('is_del','=',1)->get();
        // dd($addressInfo);die;
    	$provinceInfo=AreaModel::where(['pid'=>0])->get();
        // print_r($provinceInfo);die;
        return view('index.address',['data' => $provinceInfo,'addressInfo'=>$addressInfo]);
    }
    // 三级联动
    public function area(Request $request)
    {
        $data = $request->all();
        // print_r($data);die;
        $where = [
            ['pid' => $data]
        ];
        // print_r($where);die;
        $son = AreaModel::where(['pid' => $data])->get()->toArray();

        //空字符串
        $str='<option value="">请选择...</option>';
        //循环
        foreach ($son as $k => $v) {
            $str.='<option value="'.$v['id'].'">'.$v['name'].'</option>';
        }
        
        if($son !== false){
            return json_encode(['status'=>'200','msg'=>'ok','data'=>$str]);   
        }else{
            return json_encode(['status'=>'100','msg'=>'no']);
        }
    }

    
    // 执行添加
    public function store(Request $Request){
    	$data=request()->all();
        // dd($data);die;
        $data['is_del']=1;
        // dd($da);
        $info = UseraddressModel::insert($data);
      if($info){
        $arr=[
            "success"=>200,
            "msg"=>"成功喽！",
        ];
      }else{
        $arr=[
            "success"=>1000,
            "msg"=>"添加失败",
            "url"=>"",
        ];
      }
      echo json_encode($arr);
    } 

    // 删除
    public function Fdel(Request $request){
        $id = $request->all();
        // dd($brand_id);
        $res = UseraddressModel::where($id)->update(['is_del'=>2]);
        if($res){
            return $message = [
                "code"=>00002,
                "message"=>"删除成功",
                "success"=>true,
            ];
        }
    }
<<<<<<< HEAD
     

=======
>>>>>>> 253eb1dcf99029f1b6ffd7aa8cf8dc613dd19420
}
