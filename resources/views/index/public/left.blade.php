<div class="yui3-u Left all-sort-list">
    <div class="all-sort-list2">
        @foreach($info as $k=>$v)
                <div class="item do">
                    <h3 class="cate" cate_id="{{$v['cate_id']}}"><a href="">{{$v['cate_name']}}</a></h3>
                    <div class="item-list clearfix">
                        <div class="subitem">
                            @foreach($v['son'] as $k1=>$v1)
                            <dl class="fore1">
                                <dt>
                                    <a href="">{{$v1['cate_name']}}</a>
                                </dt>
                                <dd>
                                    @foreach($v1['son'] as $k2=>$v2)
                                    <em><a href="">{{$v2['cate_name']}}</a></em>
                                    @endforeach
                                </dd>
                            </dl>
                            @endforeach
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
</div>
