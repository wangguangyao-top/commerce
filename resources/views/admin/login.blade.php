<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>CodePen - Log In / Sign Up - pure css - #12</title>

    <link rel='stylesheet' href='/css/bootstrap.min.css'>

    <!---图标库--->
    <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>

    <link rel="stylesheet" href="/css/style.css">

</head>
<body>


<div class="section">
    <div class="container">
        <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <h6 class="mb-0 pb-3"><span>登录</span><span>注册</span></h6>
                    <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                    <label for="reg-log"></label>
                    <div class="card-3d-wrap mx-auto">
                        <div class="card-3d-wrapper">
                            <div class="card-front">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <h4 class="mb-4 pb-3">登录</h4>
                                        <div class="form-group">
                                            <input type="email" name="logemail" class="form-style" placeholder="用户名" id="logemail" autocomplete="off"  name="user_name">
                                            <i class="input-icon uil uil-at"></i>
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="password" name="logpass" class="form-style" placeholder="密码" id="logpass" autocomplete="off" name="password">
                                            <i class="input-icon uil uil-lock-alt"></i>
                                        </div>
                                        <button type="button" class="btn mt-4">提交</button>
                                        <p class="mb-0 mt-4 text-center"><a href="#0" class="link">忘记密码?</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-back">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <h4 class="mb-4 pb-3">注册</h4>
                                        <div class="form-group">
                                            <input type="text" name="logname" class="form-style" placeholder="名称" id="logname" autocomplete="off">
                                            <i class="input-icon uil uil-user"></i>
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="email" name="logemail" class="form-style" placeholder="邮箱" id="logemail" autocomplete="off">
                                            <i class="input-icon uil uil-at"></i>
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="password" name="logpass" class="form-style" placeholder="密码" id="logpass" autocomplete="off">
                                            <i class="input-icon uil uil-lock-alt"></i>
                                        </div>
                                        <button type="button" class="btn mt-4">提交</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>

<script>
    $(document).ready(function() {
        $(".mt-4").click(function() {
            // alert(111);
            var data = {};
            data.username = $("input[name = 'user_name']").val();
            data.password = $("input[name = 'password']").val();
            var url = "/admin/do";
            $.ajax({
                type: "post",
                data: data,
                url: url,
                dataType: "json",
                success: function (msg) {
                    if (msg.code == 200) {
                        alert(msg.msg);
                        window.location.href = '/admin/index';
                    } else {
                        alert(msg.msg);
                    }
                }
            })
            });
        });
	</script>
</body>

</html>
