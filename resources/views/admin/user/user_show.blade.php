@extends('admin/public/layout')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <div class="box-header with-border">
        <h3 class="box-title">用户管理
        </h3>
    </div>

    <div class="box-body">
        <ol class="breadcrumb">
            <li>
                <th>用户管理</th>
            </li>
            <li>
                <th>查看</th>
            </li>

        </ol>

        <!-- 数据表格 -->
        <div class="table-box">

            <!--工具栏-->
            <div class="pull-left">
                <div class="form-group form-inline">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default" title="添加" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 添加</button>
                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();" ><i class="fa fa-check"></i> 刷新</button>

                    </div>
                </div>
            </div>


{{--            <!--数据列表-->--}}
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>

                    <th class="sorting_asc">id</th>
                    <th class="sorting">用户名称</th>
                    <th class="sorting">添加时间</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $k=>$v)
                    <tr >
                        <td>{{$v->user_id}}</td>
                        <td>{{$v->user_name}}</td>
                        <td>{{date("Y-m-d",$v->add_time)}}</td>
                        <td class="text-center">
                            <button type="button" user_id="{{$v->user_id}}" class="btn bg-olive btn-xs del" >删除</button>
                            <a href="{{url('/admin/user/user_upd/'.$v->user_id)}}" class="btn bg-olive btn-xs">修改</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <p>{{$res->links()}}</p>
            <!--数据列表/-->
        </div>
        <!-- 数据表格 /-->
    </div>
    <!-- /.box-body -->
    <!-- 编辑窗口 -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">用户添加</h3>
                </div>
                <form action="{{url('/admin/user/user_add')}}" method="post" >
                   @csrf
                    <div class="modal-body">

                        <table class="table table-bordered table-striped"  width="800px">
                            <tr>
                                <td>用户名称</td>
                                <td><input type="text"  name="user_name" class="form-control" >  </td>
                            </tr>
                            <tr>
                                <td>用户密码</td>
                                <td><input type="password"  name="user_pwd" class="form-control" >  </td>
                            </tr>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="保存">
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on("click",".del",function(){
            var user_id = $(this).attr("user_id");
            var data = {};
            data.user_id = user_id;
            var url = "{{url('/admin/user/user_del')}}";
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
