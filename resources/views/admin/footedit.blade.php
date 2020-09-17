@extends('admin/public/layout')
@section('content')
<div class="form-horizontal">
		<input type="hidden" id="id" value="{{$foot->id}}">
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label" >友情链接标题</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="foot_name" value="{{$foot->foot_name}}">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">跳转地址</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="foot_url" value="{{$foot->foot_url}}">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">权重</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="is_weight" value="{{$foot->is_weight}}">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" id="tj" class="btn btn-default">修改</button>
		</div>
	</div>
</div>


<script  type="text/javascript">
	   $(document).on("click","#tj",function(){
	    var foot_name = $("#foot_name").val();
        var foot_url = $("#foot_url").val();
        var is_weight = $("#is_weight").val();
        var url = "/admin/foot/update";
        var data={};
        data.id={{$foot->id}}
        data.foot_name = foot_name;
        data.foot_url =foot_url;
        data.is_weight=is_weight;
        $.ajax({
            url:url,
            data:data,
            type:"post",
            dataType:"json",
            success: function(res){
              if(res.success == true){
                alert(res.msg);
                var url = res.url;
                window.location.href = url;
              }
        }

    });

	   	});
</script>
 @endsection