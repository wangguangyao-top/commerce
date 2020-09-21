@extends('admin/public/layout')
@section('content')
<div class="box-header with-border">
    <h3 class="box-title">角色管理</h3>
</div>

<div class="box-body" style="background-color: #FFFFFF">
    <!-- 数据表格 -->
    <div class="table-box">
        <div class="box-tools pull-right">
            <div class="has-feedback">
                角色名称：<input type="text">
                <button class="btn btn-default" >查询</button>
            </div>
        </div>
        <!--工具栏/-->

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="" style="padding-right:0px">
                    <input id="selall" type="checkbox" class="icheckbox_square-blue">
                </th>
                <th class="sorting_asc">用户角色名称ID</th>
                <th class="sorting">用户角色名称</th>
                <th class="sorting">添加时间</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
            <tr>
                <td><input type="checkbox"></td>
                <td>{{$v->role_id}}</td>
                <td>{{$v->role_name}}</td>
                <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
                <td class="text-center">
                    <button type="button" class="btn bg-olive btn-xs"><a href="/admin/role/role_upd/{{$v->role_id}}" style="color: #ffffff">修改</a></button>
                    <button type="button" role_id="{{$v->role_id}}" class="btn bg-olive btn-xs del" >删除</button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <!--数据列表/-->
        <p>{{$data->links()}}</p >
    </div>
    <!-- 数据表格 /-->
</div>

<script>
    $(document).on("click",".del",function(){
        var role_id = $(this).attr("role_id");
        var data = {};
        data.role_id = role_id;
        var url = "{{url('/admin/role/role_del')}}";
        if(window.confirm("是否删除")){
            $.ajax({
                type:"post",
                data:data,
                url:url,
                dateType:"json",
                success:function(res){
                    if(res.success==true){
                        alert(res.message);
                        //页面刷新
                        // history.go(0);
                        window.location.reload();
                    }
                }
            })

        }
    })
</script>
@endsection
