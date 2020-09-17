<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台管理系统</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <!-- 页面meta /-->

    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">
    <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin/plugins/adminLTE/js/app.min.js"></script>

    <script type="text/javascript">
		 function SetIFrameHeight(){
		  	  var iframeid=document.getElementById("iframe"); //iframe id
		  	  if (document.getElementById){
		  		iframeid.height =document.documentElement.clientHeight;
			  }
		 }

	</script>

</head>

<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

        <!-- 页面头部部分 -->
            @include('admin/public/top')
        <!-- 页面头部部分结束 -->

        <!-- 页面左部侧边栏开始 -->
            @include('admin/public/left')
        <!-- 页面左部侧边栏结束 -->

        <!-- 内容区域 -->
        <div class="content-wrapper">
			{{--<iframe width="100%" id="iframe" name="iframe"	onload="SetIFrameHeight()" frameborder="0" src=""></iframe>--}}
            @section('content')
            @show

        </div>
        <!-- 内容区域 /-->

        <!-- 底部导航开始 -->
            @include('admin/public/foot')
        <!-- 底部导航结束 -->
    </div>
</body>

</html>
