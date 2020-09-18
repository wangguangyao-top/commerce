@extends('admin/public/layout')
@section('content')
  <!-- .box-body -->
                    <div class="box-header with-border">
                        <h3 class="box-title">导航管理     
                       	</h3>
                    </div>
                    <div class="box-body">
                  			 <ol class="breadcrumb">	                        	
                        		<li>
		                        	<a href="#" >顶级分类列表</a> 
		                        </li>
		                        <li>
		                       		<a href="#" >珠宝</a>
		                        </li>
		                        <li>
		                        	<a href="#" >银饰</a>
		                        </li>
	                        </ol>
                        <!-- 数据表格 -->
                        <div class="table-box">
                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 新建</button>
                                        <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                                        <button type="button" class="btn btn-default" title="刷新" ><i class="fa fa-check"></i> 刷新</button>
                                    </div>
                                </div>
                            </div>
			                <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                              <th class="" style="padding-right:0px">
			                                  <input type="checkbox" class="icheckbox_square-blue">
			                              </th> 
										  <th class="sorting_asc">导航ID</th>
									      <th class="sorting">导航名称</th>									   
									      <th class="sorting">导航跳转</th>
									      <th class="sorting">权重</th>
									      <th class="sorting">是否展示</th>
									      <th class="sorting">是否删除</th>
									      <th class="sorting">添加时间</th>
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      @foreach($data as $k=>$v)
			                      <tbody>
			                          <tr>
			                              <td><input  type="checkbox"></td>
				                          <td>{{$v->nav_id}}</td>
									      <td>{{$v->nav_name}}</td>
									      <td>{{$v->nav_url}}</td>
									      <td>{{$v->is_weigh}}</td>
									      <td>{{$v->is_show}}</td>
									      <td>{{$v->is_del}}</td>
									      <td>{{date("Y-m-d",$v->add_time)}}</td>
		                                  <td class="text-center">		                                     
		                                      <button type="button" class="btn bg-olive btn-xs" >查询下级</button>
		                                 	  <button class="btn bg-olive btn-xs del" id="{{$v->nav_id}}">删除</button>
		                                 	  <a href="{{url('/admin/nav/upda/'.$v->nav_id)}}" class="btn bg-olive btn-xs">修改</a>
		                                  </td>
			                          </tr>
			                      </tbody>
			                      @endforeach
			                  </table>
			                  <!--数据列表/-->
                        </div>
                        <!-- 数据表格 /-->
                     </div>
                    <!-- /.box-body -->

			<script  type="text/javascript">
			 			$(document).on("click",".del",function(){
			            var id = $(this).attr("id");
			            var data = {nav_id:id};
			            var url = "{{url('/admin/nav/edit')}}";
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