<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\models\UserinfoModel;
use App\models\AreaModel;
use Illuminate\Http\Request;

class UserinfoController extends Controller
{
    public function show()
    {
        $area = AreaModel::where(['pid' => 0])->get();

        return view('index.userinfo', ['area' => $area]);
    }

    //使用插件图片上传
    public function addimg(Request $request)
    {
        $arr = $_FILES["Filedata"];
        $tmpName = $arr['tmp_name'];
        $ext = explode(".", $arr['name'])[1];
        $newFileName = md5(time()) . "." . $ext;
        $newFilePath = "./uploads/" . $newFileName;
        move_uploaded_file($tmpName, $newFilePath);
        $newFilePath = trim($newFilePath, ".");
        echo $newFilePath;
    }

    public function add(Request $request)
    {
        $user_id = session('user')['user_id'];
        $post = $request->all();
//        dd($post);
        $user = UserinfoModel::where('user_name',$post['user_name'])->first();
        if($user){
            return ['status'=>'000001','msg'=>'该用户名已存在'];
        }
        $data = [
            'user_name' => $post['user_name'],
            'my_sex' => $post['my_sex'],
            'my_birthday' => $post['my_birthday'],
            'my_site1' => $post['my_site1'],
            'my_site2' => $post['my_site2'],
            'my_site3' => $post['my_site3'],
            'my_img' => $post['my_img'],
            'user_id' => $user_id
        ];

//            $res = UserinfoModel::where('user_id',$post['user_id'])->get();
        $res = UserinfoModel::insert($data);
            if ($res) {
                return Redirect("index/show");
            }
    }
    //三级联动
    public function area($id)
    {
        $son = AreaModel::where(['pid' => $id])->get()->toArray();
        return [
            'code' => '00000',
            'data' => $son
        ];
    }
    //修改页面
    public function update(){
        $area = AreaModel::where(['pid' => 0])->get();
//        获取用户id
        $user = session('user');
        $myinfo = UserinfoModel::where(['user_id'=>$user['user_id']])->first();
        //市级
        $my_site2=AreaModel::where(['pid'=>$myinfo->my_site1])->get();
        //区、县级
        $my_site3=AreaModel::where(['pid'=>$myinfo->my_site2])->get();
        return view('index.userupdate',['area'=>$area,'myinfo'=>$myinfo,'my_site2'=>$my_site2,'my_site3'=>$my_site3]);
    }
    //执行修改
    public function doupdate(Request $request){
        $id= request()->my_id;
//        dd($id);
        $post = $request->all();
//        dd($post);
        $data = [
            'user_name' => $post['user_name'],
            'my_sex' => $post['my_sex'],
            'my_birthday' => $post['my_birthday'],
            'my_site1' => $post['my_site1'],
            'my_site2' => $post['my_site2'],
            'my_site3' => $post['my_site3'],
            'my_img' => $post['my_img'],
        ];

//        dd($data);
        $res = UserinfoModel::where('my_id',$id)->update($data);
//        dd($res);
        if ($res) {
            return Redirect("index/show");
        }
    }
}
