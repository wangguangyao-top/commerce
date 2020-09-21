
@extends('admin/public/layout')
@section('content')
    <!-- 正文区域 -->
    <div class="box-header with-border">
        <h3 class="box-title">用户角色添加</h3>
    </div>
    <!--扩展属性-->
    <section class="content">
        <div class="box-body">
            <!--tab页-->
            <div class="nav-tabs-custom">
                <!--tab头-->
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="javascript:;">用户角色添加</a>
                    </li>
                </ul>
                <!--tab头/-->

                <!--tab内容-->
                <div class="tab-content">

                    <!--表单内容-->
                    <div class="tab-pane active">
                        <div class="row data-type">
                            <div class="col-md-2 title"><b>用户名称：</b></div>
                            <div class="col-md-10 data">
                                <select class="form-control" name="user_id">
                                    <option value="{{$arr->user_id}}">{{$arr->user_name}}</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row data-type">
                        <div class="col-md-2 title"><b>角色名称：</b></div>
                        <div class="col-md-10 data">
                            添加角色：
                            @foreach($all as $v)
                                <input type="checkbox" {{in_array($v->role_id,$role)?'checked':''}} class="role_id" name="role_id" value="{{$v->role_id}}" >{{$v->role_name}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!--tab内容/-->
            <!--表单内容/-->
        </div>

        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary but" id="sub">提交</button>
            <button class="btn btn-danger"><a href="{{url('admin/rolepermission/role_show')}}" style="color: #ffffff">返回列表页面</a></button>
        </div>
        </div>
    </section>
    <!-- 正文区域 /-->
    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $(document).on("click",".but",function(){
                var user_id = $("select[name = 'user_id']").val();
                var role_id = [];
                $("input[name='role_id']:checked").each(function () {
                    role_id.push($(this).val());
                });

                // role_id = $("input[name='role_id']").val();
                // console.log(data);
                // return false;
                var url = "/admin/adminrole/adoadd";
                $.ajax({
                    type:"post",
                    data:{user_id:user_id,role_id:role_id},
                    url:url,
                    dataType:"json",
                    success:function (msg) {
                       // console.log(msg)
                        if(msg.success == true){
                            window.location.href = '/admin/user/user_show';
                        }
                    }
                })
            });
        });
    </script>
@endsection
