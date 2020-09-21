
@extends('admin/public/layout')
@section('content')
    <!-- 正文区域 -->
    <div class="box-header with-border">
        <h3 class="box-title">角色添加</h3>
    </div>
    <!--扩展属性-->
    <section class="content">
        <div class="box-body">
            <!--tab页-->
            <div class="nav-tabs-custom">
                <!--tab头-->
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="javascript:;">角色添加</a>
                    </li>
                </ul>
                <!--tab头/-->

                <!--tab内容-->
                <div class="tab-content">

                    <!--表单内容-->
                    <div class="tab-pane active">
                        <div class="row data-type">
                            <div class="col-md-2 title"><b>角色名称：</b></div>
                            <div class="col-md-10 data">
                                <input type="text" name="role_name" id="role_name" class="form-control"  placeholder="请输入角色名称。" value="">
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
                var role_name=$('#role_name').val()
                //通过ajax传送值
                $.ajax({
                    //请求路径
                    url:"/admin/role/role_adddo",
                    //请求方式
                    type:"post",
                    //请求数据
                    data:{role_name:role_name},
                    //预期返回数据类型
                    dataType:'json',
                    //回调函数
                    success:function(res){
                        //判断返回结果
                        if(res.success==true){
                            alert('OK')
                            location.href='/admin/role/role_show'
                        }
                    }
                })
            })
        })
    </script>
@endsection
