<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\models\NavModel;
use App\models\CodeModel;
use App\models\IndexUserModel;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(){
        $navdata = NavModel::where('is_del',1)->get()->toArray();
        return view('index.register',['navdata'=>$navdata]);
    }
    //注册
    public function reg(Request $request)
    {
        $post = $request->all();
        $user = IndexUserModel::where('user_name', $post['user_name'])->first();
        if ($user) {
            return [
                'status' => 000001,
                'msg' => '用户名已存在'
            ];
        }
        if ($post['user_pwd'] != $post['user_repwd']) {
            return [
                'status' => 00001,
                'msg' => '两次密码不一致'
            ];
        }
        $code = CodeModel::where('code', $post['code'])->first();
        if (time() - $code['over_time'] >= 0) {
            return [
                'status' => 10001,
                'msg' => '验证码已过期'
            ];
        } else {
            $data = [
                'user_tel' => $post['user_tel'],
                'user_name' => $post['user_name'],
                'user_pwd' => encrypt($post['user_pwd']),
                'add_time' => time()
            ];
            $obj = IndexUserModel::create($data);
            if ($obj) {
                return [
                    'status' => 000000,
                    'msg' => '注册成功'
                ];
            }
        }
    }
    public function sendSmsCode(Request $request){
        $user_tel = $request -> user_tel;
//        dd($user_tel);
        if(empty($user_tel)){
            return [
                'status' => 10001,
                'msg' => '手机号不能为空'
            ];
        }elseif(strlen($user_tel)!=11){
            return [
                'status' => 10001,
                'msg' => '手机号必须为11位'
            ];
        }elseif(is_numeric($user_tel) == false){
            return [
                'status' => 10001,
                'msg' => '手机号必须为数字'
            ];
        }


        $str = CodeModel::where('user_tel',$user_tel)->first();
        if($str){
            return [
                'status' => 10001,
                'msg' => '手机号已存在'
            ];
        }
        $rand_code = rand(100000,999999);
        # 调用短信验证码接口
        $code = $this -> code($user_tel,$rand_code);
        if($code['code'] != 200){
            return [
                'status' => 000001,
                'msg' => '验证码发送失败'
            ];
        }

        $data = [
            'user_tel' => $user_tel,
            'code' => $rand_code,
            'add_time' => time(),
            'over_time' => time()+60
        ];
//        dd($data);
        $obj = CodeModel::create($data);
//        $obj=true
        if($obj==true){
            return $code;
        }
    }
    /**
     * 短信验证码接口
     */
    public function code($user_tel,$rand_code){
//        return true;
        return ['code'=>200,'msg'=>'发送成功','data'=>['user_tel'=>$user_tel,'rand_code'=>$rand_code]];
        $host = "http://dingxin.market.alicloudapi.com";
        $path = "/dx/sendSms";
        $method = "POST";
        $appcode = "e6f573c2087849ce9e4cd67f6193a6df";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "mobile=".$user_tel."&param=code%3A".$rand_code."&tpl_id=TP1711063";
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        $curl_result = curl_exec($curl);
//        dump($curl_result);
        $curl_arr = json_decode( $curl_result , true );
//        dd($curl_arr);
        if( !empty( $curl_arr ) && $curl_arr['return_code'] == '00000' ){

        }else{
            return false;
        }
    }
}
