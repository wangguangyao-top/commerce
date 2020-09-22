
@extends('admin/public/layout')
@section('content')
    <!-- 正文区域 -->
    <div class="box-header with-border">
        <h3 class="box-title">角色权限添加</h3>
    </div>
    <!--扩展属性-->
    <section class="content">
        <div class="box-body">
            <!--tab页-->
            <div class="nav-tabs-custom">
                <!--tab头-->
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="javascript:;">角色权限添加</a>
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
                                角色：<select name="role_id">
                                    <option>--请选择--</option>
                                    @foreach($arr as $v)
                                        <option value="{{$v->role_id}}">{{$v->role_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row data-type">
                        <div class="col-md-2 title"><b>权限名称：</b></div>
                        <div class="col-md-10 data">
                            添加权限：
                            @foreach($all as $v)
                                <input type="checkbox" class="p_id" name="p_id" value="{{$v->p_id}}" >{{$v->p_name}}
                            @endforeach
                        </div>
                    </div>
                </div>
                </div>
                <!--tab内容/-->
                <!--表单内容/-->
            </div>

        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" id="sub">提交</button>
            <button class="btn btn-danger"><a href="{{url('admin/rolepermission/rpshow')}}" style="color: #ffffff">返回列表页面</a></button>
        </div>
        </div>
    </section>
    <!-- 正文区域 /-->

    <script>
        $(document).ready(function() {
            $("#sub").click(function () {
                // alert(123);
                var role_id = $("select[name = 'role_id']").val();
                var p_id = [];
                $("input[name='p_id']:checked").each(function () {
                    p_id.push($(this).val());
                });

                // data.role_id = $("input[name='role_id']").val();
                // console.log(data);
                // return false;
                var url = "/admin/rolepermission/rpdoadd";
                $.ajax({
                    type: "post",
                    data: {role_id: role_id, p_id: p_id},
                    url: url,
                    dataType: "json",
                    success: function (msg) {
                        if(msg.success == true){
                            alert('OK')
                            window.location.href = "/admin/rolepermission/show";
                        }
                    }
                })
            });
        });
    </script>
@endsection
