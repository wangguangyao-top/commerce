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
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)

    {
        $user = session('user_id');
        if (empty($user)) {
            return redirect('/admin/login');
        }
        $user1=UserModel::where(['is_del'=>1,'user_id'=>$user])->first();
        $user2=AdminroleModel::orderBy('add_time','desc')->where('user_id',$user)->first();
        if(empty($user1)) {
            echo "<script>alert('你没有权限访问~请联系管理员添加权限');history.back(-1);</script>";
            exit;
        }
        if($user1->user_name== '王光耀'){
            return $next($request);
        }
        if(empty($user2)){
            echo "<script>alert('你没有权限访问~请联系管理员添加权限');history.back(-1);</script>";
            exit;
        }
            $user2_arr=explode(',',trim($user2->role_id,','));
            $role_arr=RolepermissionModel::where('is_del',1)->whereIn('role_id',$user2_arr)->get()->toArray();
            if(empty($role_arr)){
                echo "<script>alert('你没有权限访问~请联系管理员添加权限');history.back(-1);</script>";
                exit;
            }
            $url=$request->path();
            foreach ($role_arr as $k=>$v) {
                $permission_id=explode(',',trim($v['p_id'],','));
                asort($permission_id);
                $arr=PerssionModel::where('is_del',1)->whereIN('p_id',$permission_id)->get('p_node')->toArray();
                foreach ($arr as $k1=>$v1) {
                    if($url==$v1['p_node'] || $url=='admin/index'){
                        return $next($request);
                    }else{
                        echo "<script>alert('你没有权限访问~请联系管理员添加权限');history.go(-1);</script>";
                        exit;
                    }
                }
            }
    }
}
