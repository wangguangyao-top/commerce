@extends('admin/public/layout')
@section('content')
<div>
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">用户修改</h3>
		</div>
		<form action="{{url('/admin/user/user_upddo/'.$res->user_id)}}" method="post" enctype="multipart/form-data">
<div class="modal-body">
    <table class="table table-bordered table-striped"  width="800px">
        <tr>
            <td>用户名称</td>
            <td><input type="text"  name="user_name" class="form-control" >
            </td>
        </tr>
        <tr>
            <td>用户密码</td>
            <td><input type="text" id="fileupload" name="slide_weight" value="{{$res->slide_weight}}" class="form-control" >  </td>
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
@endsection
