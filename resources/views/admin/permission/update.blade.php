
@extends('admin/public/layout')
@section('content')
    <!-- 正文区域 -->
    <div class="box-header with-border">
        <h3 class="box-title">权限修改</h3>
    </div>
    <!--扩展属性-->
    <section class="content">
        <div class="box-body">
            <!--tab页-->
            <div class="nav-tabs-custom">
                <!--tab头-->
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="javascript:;">权限修改</a>
                    </li>
                </ul>
                <!--tab头/-->

                <!--tab内容-->
                <div class="tab-content">
                    <input type="hidden" name="p_id" value="{{$res->p_id}}">
                    <!--表单内容-->
                    <div class="tab-pane active">
                        <div class="row data-type">
                            <div class="col-md-2 title"><b>权限名称：</b></div>
                            <div class="col-md-10 data">
                                <input type="text" name="p_name" id="role_name" class="form-control" value="{{$res->p_name}}">
                            </div>
                        </div>
                    </div>
                    <div class="row data-type">
                        <div class="col-md-2 title"><b>权限路由：</b></div>
                        <div class="col-md-10 data">
                            <input type="text" name="p_node" id="p_node" class="form-control"  value="{{$res->p_node}}">
                        </div>
                    </div>
                </div>
                </div>
                <!--tab内容/-->
                <!--表单内容/-->
            </div>
        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" id="sub">提交</button>
            <button class="btn btn-danger"><a href="{{url('admin/permission/per_show')}}" style="color: #ffffff">返回列表页面</a></button>
        </div>
        </div>


    </section>
    <!-- 正文区域 /-->

    <script>
        $(document).ready(function(){
            //提交事件
            $(document).on('click','#sub',function(){
                //获取角色名称值
                var data = {};
                data.p_id = $("input[name='p_id']").val();
                data.p_name = $("input[name='p_name']").val();
                data.p_node = $("input[name='p_node']").val();
                //通过ajax传送值
                $.ajax({
                    //请求路径
                    url:"/admin/permission/per_upddo",
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
                            location.href='/admin/permission/per_show'
                        }
                    }
                })
            })
        })
    </script>
@endsection
