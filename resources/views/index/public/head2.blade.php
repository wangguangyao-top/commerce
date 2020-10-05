<div class="py-container">
    <div class="shortcut">
        <ul class="fl">
            <li class="f-item">品优购欢迎您！</li>

            @php
                $user=session('user');
            @endphp
            @if(empty($user))
                <li class="f-item">请先<a href="{{url('index/login')}}">登录</a>　<span><a href="{{url('index/register')}}">免费注册</a></span></li>
            @else
                <li class="f-item"><span><a>{{$user['user_name']}}</a></span>&nbsp;|&nbsp;<a href="{{url('index/quit')}}">退出</a></li>
            @endif

        </ul>
        <ul class="fr">
            @if(!empty($user))
                <li class="f-item"><a href="{{url('index/order')}}">我的订单</a></li>
                <li class="f-item space"></li>
            @endif
            <li class="f-item"><a href="home.html" target="_blank">我的品优购</a></li>
            <li class="f-item space"></li>
            <li class="f-item">品优购会员</li>
            <li class="f-item space"></li>
            <li class="f-item">企业采购</li>
            <li class="f-item space"></li>
            <li class="f-item">关注品优购</li>
            <li class="f-item space"></li>
            <li class="f-item" id="service">
                <span>客户服务</span>
                <ul class="service">
                    <li><a href="cooperation.html" target="_blank">合作招商</a></li>
                    <li><a href="shoplogin.html" target="_blank">商家后台</a></li>
                    <li><a href="cooperation.html" target="_blank">合作招商</a></li>
                    <li><a href="#">商家后台</a></li>
                </ul>
            </li>
            <li class="f-item space"></li>
            <li class="f-item">网站导航</li>
        </ul>
    </div>
</div>
