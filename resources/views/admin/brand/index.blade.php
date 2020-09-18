@extends('admin/public/layout')
@section('content')
  <!-- .box-body -->
                
                    <div class="box-header with-border">
                        <h3 class="box-title">品牌管理     
                       	</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">
							
                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 新建<tton>
                                        <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除<tton>
                                        <button type="button" class="btn btn-default" title="刷新" ><i class="fa fa-check"></i> 刷新<tton>
                                       
                                    </div>
                                </div>
                            </div>                          
                       		
                        
			                <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                              
										  <th class="sorting_asc">ID</th>
									      <th class="sorting">品牌名称</th>									   
									      <th class="sorting">品牌url</th>
									      <th class="sorting">品牌logo</th>
									      <th class="sorting">是否显示</th>
                                          <th class="sorting">添加时间</th>
									      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      @foreach($brand as $v)
			                      <tbody>
			                          <tr >
			                              <td>{{$v->brand_id}}</td>			                              
				                          <td>{{$v->brand_name}}</td>
									      <td>{{$v->brand_url}}</td>	
									       <td><img src="{{$v->brand_log}}" width="80px"></td>											    
                                           <td>{{$v->brand_show==1?'√':'×'}}</td>    
									      <td>{{date("Y-m-d",$v->add_time)}}</td>								      
		                                  <td class="text-center">		                                     
		                                      
		                                      <button class="btn bg-olive btn-xs del" brand_id="{{$v->brand_id}}">删除</button>|	                                
		                                 	  <a href="{{url('/admin/brand/edit/'.$v->brand_id)}}" class="btn bg-olive btn-xs" >修改</a>                                         
		                                  </td>
			                          </tr>
			                      </tbody>
			             		@endforeach
			                  </table>
			                  <!--数据列表/-->                      
					</div>
                        <!-- 数据表格 /-->
               </div>
			<script  type="text/javascript">
 			$(document).on("click",".del",function(){
            var brand_id = $(this).attr("brand_id");
            var data = {brand_id:brand_id};
            var url = "{{url('/admin/brand/Fdel')}}";
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