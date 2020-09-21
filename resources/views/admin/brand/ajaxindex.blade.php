  								@foreach($brand as $v)
			                   
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
			                 
			             		@endforeach
			             		<tr><td colspan=17 align="center">{{$brand->appends(['brand_name'=>$brand_name])->links()}}</td></tr>