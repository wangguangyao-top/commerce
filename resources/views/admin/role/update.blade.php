
@extends('admin/public/layout')
@section('content')
    <!-- 正文区域 -->
    <div class="box-header with-border">
        <h3 class="box-title">角色修改</h3>
    </div>
    <!--扩展属性-->
    <section class="content">
        <div class="box-body">
            <!--tab页-->
            <div class="nav-tabs-custom">
                <!--tab头-->
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="javascript:;">角色修改</a>
                    </li>
                </ul>
                <!--tab头/-->

                <!--tab内容-->
                <div class="tab-content">
                    <input type="hidden" name="role_id" value="{{$res->role_id}}">
                    <!--表单内容-->
                    <div class="tab-pane active">
                        <div class="row data-type">
                            <div class="col-md-2 title"><b>角色名称：</b></div>
                            <div class="col-md-10 data">
                                <input type="text" name="role_name" id="role_name" class="form-control"  placeholder="请输入角色名称。" value="{{$res->role_name}}">
                            </div>
                        </div>
                    </div>
                </div>
                <!--tab内容/-->
                <!--表单内容/-->
            </div>
        </div>
        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" id="sub">提交</button>
            <button class="btn btn-danger"><a href="{{url('admin/role/role_show')}}" style="color: #ffffff">返回列表页面</a></button>
        </div>

    </section>
    <!-- 正文区域 /-->

    <script>
        $(document).ready(function(){
            //提交事件
            $(document).on('click','#sub',function(){
                //获取角色名称值
                var data = {};
                data.role_id = $("input[name='role_id']").val();
                data.role_name = $("input[name='role_name']").val();
                //通过ajax传送值
                $.ajax({
                    //请求路径
                    url:"/admin/role/role_upddo",
                    //请求方式
                    type:"post",
                    //请求数据
                    data:data,
                    //预期返回数据类型
                    dataType:'json',
                    //回调函数
                    success:function(res){
                        //判断返回结果
                        if(res.status=='00000'){
                            alert(res.msg)
                            location.href='/admin/role/role_show'
                        }
                    }
                })
            })
        })
    </script>
@endsection
