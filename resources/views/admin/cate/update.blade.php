@extends('admin/public/layout')
@section('content')
<div class="form-horizontal">
		<input type="hidden" id="nav_id" value="{{$data->nav_id}}">
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">导航名</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="Nav_name" value="{{$data->nav_name}}" placeholder="请输入导航名">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">导航跳转</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="Nav_url" value="{{$data->nav_url}}" placeholder="导航跳转">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">权重</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="is_weigh" value="{{$data->is_weigh}}" placeholder="请输入权重">
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn tj btn-default">修改</button>
		</div>
	</div>
</div>


<script  type="text/javascript">
	   $(document).on("click",".tj",function(){
		    var Nav_name = $("#Nav_name").val();
	        var Nav_url  = $("#Nav_url").val();
	        var is_weigh = $("#is_weigh").val();
	        // var is_show  = $(".is_show:checked").val();
	        var url = "/admin/nav/updata";
	        var data={};
	        data.id = {{$data->nav_id}}
	        data.Nav_name = Nav_name;
	        data.Nav_url  = Nav_url;
	        data.is_weigh = is_weigh;
	        // data.is_show  = is_show;
	        $.ajax({
	            url:url,
	            data:data,
	            type:"post",
	            dataType:"json",
	            success: function(res){
	              if(res.success == 200){
	                alert(res.msg);
	                var url = res.url;
	                window.location.href = url;
	              }
	        	}
	    	});
	   	});
</script>
 @endsection