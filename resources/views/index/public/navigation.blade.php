<div class="yui3-g NavList">
    <div class="yui3-u Left all-sort">
        <h4>全部商品分类</h4>
    </div>
    <div class="yui3-u Center navArea">
        <ul class="nav">
            @foreach($navdata as $v)
            <li class="f-item">{{$v->nav_name}}</li>
           @endforeach
            <li class="f-item"><a href="seckill-index.html" target="_blank">秒杀</a></li>
        </ul>
    </div>
    <div class="yui3-u Right"></div>
</div>
