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
        $post = $request->all();
        $data = [
            'user_name' => $post['user_name'],
            'my_sex' => $post['my_sex'],
            'my_birthday' => $post['my_birthday'],
            'my_site1' => $post['my_site1'],
            'my_site2' => $post['my_site2'],
            'my_site3' => $post['my_site3'],
            'my_img' => $post['my_img'],
        ];

        $res = UserinfoModel::insert($data);
        // dd($res);
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
}
