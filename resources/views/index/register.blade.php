<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>个人注册</title>


    <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-register.css" />
</head>

<body>
	<div class="register py-container ">
		<!--head-->
		<div class="logoArea">
			<a href="" class="logo"></a>
		</div>
		<!--register-->
		<div class="registerArea">
			<h3>注册新用户<span class="go">我有账号，去<a href="{{url('index/login')}}">登陆</a></span></h3>
            <div class="info">
                <form class="sui-form form-horizontal">
                    <div class="control-group">
                        <label class="control-label">用户名：</label>
                        <div class="controls">
                            <input type="text" name="user_name" placeholder="请输入你的用户名" class="input-xfat input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">登录密码：</label>
                        <div class="controls">
                            <input type="password" name="user_pwd" placeholder="设置登录密码" class="input-xfat input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">确认密码：</label>
                        <div class="controls">
                            <input type="password" name="user_repwd" placeholder="再次确认密码" class="input-xfat input-xlarge">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">手机号：</label>
                        <div class="controls">
                            <input type="text" name="user_tel" placeholder="请输入你的手机号" class="input-xfat input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">短信验证码：</label>
                        <div class="controls">
                            <input type="text" name="code" placeholder="短信验证码" class="input-xfat input-xlarge">
                            <button type="button" id="code" class="sendVerifyCode">发送验证码</button>
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="inputPassword" class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <div class="controls">
                            <input name="m1" type="checkbox" value="2" checked=""><span>同意协议并注册《品优购用户协议》</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"></label>
                        <div class="controls btn-reg">
                            <a class="sui-btn btn-block btn-xlarge btn-danger" id="btn" target="_blank">完成注册</a>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
		<!--foot-->
		<div class="py-container copyright">
			<ul>
				<li>关于我们</li>
				<li>联系我们</li>
				<li>联系客服</li>
				<li>商家入驻</li>
				<li>营销中心</li>
				<li>手机品优购</li>
				<li>销售联盟</li>
				<li>品优购社区</li>
			</ul>
			<div class="address">地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</div>
			<div class="beian">京ICP备08001421号京公网安备110108007702
			</div>
		</div>
	</div>


<script type="text/javascript" src="/index/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/index/js/pages/register.js"></script>
</body>

</html>
<script>
    $(function(){
        function vals() {
            s=$(".sendVerifyCode").text();
            s=parseInt(s);
            if(s<=0){
                s=$(".sendVerifyCode").text("获取验证码");
                clearInterval(_t)
                $(".sendVerifyCode").css("pointer-events", "auto")
            }else{
                s=s-1;
                s=$(".sendVerifyCode").text(s+"s");
                $(".sendVerifyCode").css("pointer-events", "none")
            }


        }
        $(document).on('click','#code',function(){
//        alert(123);
//        return false;
            var user_tel = $("input[name='user_tel']").val();
            var treg=/^1[345789]\d{9}$/;
            if(user_tel == ''){
                alert('手机号不能为空');
                return false;
            }else if (!treg.test(user_tel)){
                alert('手机号格式不正确');
                return false;
            }else{

                $.ajax({
                    url:"{{url('/index/sendSmsCode')}}",
                    type:'post',
                    data:{user_tel:user_tel},
                    dataType:'json',
                    success:function(res){
                        if(res.status == 000000){
                            $(".sendVerifyCode").text("60s");//这个是吧span里面值改成5s
                            _t=setInterval(vals,1000);//定时器
                            $(".sendVerifyCode").css("pointer-events", "none")//置灰
                            alert(res.msg);
                        }else{
                            alert(res.msg);
                        }
                    }
                })
            }


        });

        $(document).on('click','#btn',function(){
            var str=/^[\u4e00-\u9fa5]+$/;
            var user_name = $("input[name='user_name']").val();
            var user_pwd = $("input[name='user_pwd']").val();
            var user_repwd = $("input[name='user_repwd']").val();
            var user_tel = $("input[name='user_tel']").val();
            var code = $("input[name='code']").val();

            if(!str.test(user_name)){
                alert('用户名称是中文');
            }

            if(user_name == ''||user_pwd == ''||user_repwd == ''||user_tel == ''||code == ''){
                alert('不能为空');
            }else{
                $.ajax({
                    url:"{{url('/index/reg')}}",
                    type:'post',
                    data:{user_name:user_name,user_tel:user_tel,user_pwd:user_pwd,user_repwd:user_repwd,code:code},
                    dataType:'json',
                    success:function(res){
                        if(res.status == 10001){
                            alert(res.msg);
                        }
                        if(res.status == 000001){
                            alert(res.msg);
                        }
                        if(res.status == 000000){
                            alert(res.msg);
                            window.location.href="{{url('/index/login')}}";
                        }
                    }
                })
            }
        });
    })

</script>
