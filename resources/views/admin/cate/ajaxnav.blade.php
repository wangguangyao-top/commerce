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
			                      
			                      <tbody id="nav_info">
			                      	@foreach($data as $k=>$v)
			                          <tr>
			                              <td><input  type="checkbox"></td>
				                          <td>{{$v->nav_id}}</td>
									      <td>{{$v->nav_name}}</td>
									      <td>{{$v->nav_url}}</td>
									      <td>{{$v->is_weigh}}</td>
									      <td>{{$v->is_show==1?'是':'否'}}</td>
									      <td>{{$v->is_del==1?'是':'否'}}</td>
									      <td>{{date("Y-m-d",$v->add_time)}}</td>
		                                  <td class="text-center">		                                     
		                                      <button type="button" class="btn bg-olive btn-xs" >查询下级</button>
		                                 	  <button class="btn bg-olive btn-xs del" id="{{$v->nav_id}}">删除</button>
		                                 	  <a href="{{url('/admin/nav/upda/'.$v->nav_id)}}" class="btn bg-olive btn-xs">修改</a>
		                                  </td>
			                          </tr>
			                          @endforeach
			                      </tbody>
			                      
			                          <tr><td colspan=17 align="center">{{$data->appends(['nav_name'=>$nav_name])->links()}}</td></tr>

			                  </table>