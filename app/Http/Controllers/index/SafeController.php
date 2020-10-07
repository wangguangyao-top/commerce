<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 设置安全管理页
        return view('index/orderSafe');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = request()->all();
        // $info = [
        //     'pwd' = 'pwd';
        //     'n_pwd' = 'n_pwd';
        //     're_pwd' = 're_pwd';
        // ];
        // dd($info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       //  判断登录没有

        // $user = session(user);


       // MD5(接受的密码)  和 库里的密码比较



       //  一样的话修改

        // 判断新密码 和 确认新密码 是否一致

        // 一致
       
        // Request：：where(['id','=',user['id']])->update(['pwd'=> md5(接受的新密码)]);

        //     session_name()

        // 不一致返回错误




       //   不一样返回个错误
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
