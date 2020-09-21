 								@foreach($foot as $v)
			                     
			                          <tr>
			                              <td>{{$v->id}}</td>			                              
				                          <td>{{$v->foot_name}}</td>
									      <td>{{$v->foot_url}}</td>	
									       <td>{{$v->is_weight}}</td>											    
									      <td>{{date("Y-m-d",$v->add_time)}}</td>								      
		                                  <td class="text-center">		                                     
		                                      
		                                      <button class="btn bg-olive btn-xs del" id="{{$v->id}}">删除</button>|	                                
		                                 	  <a href="{{url('/admin/foot/edit/'.$v->id)}}" class="btn bg-olive btn-xs" >修改</a>                                         
		                                  </td>
			                          </tr>
			                      @endforeach
                                <tr><td colspan=17 align="center">{{$foot->appends(['foot_name'=>$foot_name])->links()}}</td></tr>
                         