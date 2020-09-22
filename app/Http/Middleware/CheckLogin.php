<?php

namespace App\Http\Middleware;

use App\models\AdminroleModel;
use App\models\PerssionModel;
use App\models\RolepermissionModel;
use Closure;
//引入用户model
use App\models\UserModel;
use Illuminate\Support\Facades\DB;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)

    {
        $user=session('user_id');
        if(empty($user)){
            return redirect('/admin/login');
        }
        $user_id=UserModel::where(['user_id'=>$user])->first();
        if(!empty($user_id)){
            if($user_id->user_name == '王光耀'){
                return $next($request);
            }else{
                $url = $request->path();
                if($url=='admin/index') {
                    return $next($request);
                }
                $user_role = AdminroleModel::where('user_id',$user)->orderBy('id','desc')->first();
                if($user_role == null){
                    echo "<script>alert('您没有权限访问~请联系管理员添加权限')</script>";
                    exit;
                }else{
                    $role_id = trim($user_role->role_id,',');
                    //explode将字符串转化为数组
                    $user_role->role_id = explode(',',$role_id);
//                    dd($user_role);
                    $arr_poter = [];
                    foreach ($user_role->role_id as $v){
                        $role_poter = RolepermissionModel::
                            where('role_id','=',$v)
                            ->orderBy('id','desc')->first();
                        $arr_poter [] = $role_poter;
                    }
                    foreach ($arr_poter as &$vv){
                        if(!empty($vv)){
//                            dd($vv);
                            $pid = trim($vv->p_id,',');
                            $arr_poter2= array_unique(explode(',',$pid));
                        }
                    }
                   foreach($arr_poter2 as $vv2){
                       foreach($vv2 as $vv3){

                            $poter = PerssionModel::whereIN('p_id',$arr_poter2)->get('p_node')->toArray();
                            foreach ($poter as $key2=>$value2) {
                                $poter2[]=$value2['p_node'];
                            }
                           if(!empty($poter)){
                               $poter2[] = $poter->url;
                           }
                       }
                   }
                }
//        dd($url);
                if(in_array($url,$poter2)){
                    return $next($request);
                }else{
                    echo "<script>alert('你没有权限访问~请联系管理员添加权限');history.back(-1);</script>";
                    exit;
                }
            }
        }
        return $next($request);
    }
}
