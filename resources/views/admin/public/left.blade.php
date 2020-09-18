<!-- 导航侧栏 -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/admin/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> chendahai</p>
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>
        <ul class="sidebar-menu"  >
            <li class="header">菜单</li>
            <li id="admin-index"><a href="{{url('admin/index')}}"><i class="fa fa-dashboard"></i> <span>首页</span></a></li>

            <!-- 菜单 -->

            <!-- 基本管理 -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>基本管理</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="seller.html">
                            <i class="fa fa-circle-o"></i> 修改资料
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="password.html">
                            <i class="fa fa-circle-o"></i> 修改密码
                        </a>
                    </li>
                </ul>
            </li>
            <!-- 基本管理 -->

            <!-- 商品管理 -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>商品管理</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">
                    <li id="admin-login">
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>商品</span>
                            <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li id="admin-login">
                                <a href="{{url('/admin/goods/goodsEdit')}}">
                                    <i class="fa fa-circle-o"></i> 新增商品
                                </a>
                            </li>
                            <li id="admin-login">
                                <a href="/admin/goods/goodsShow">
                                    <i class="fa fa-circle-o"></i> 商品展示
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{--商品属性管理开始--}}
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>商品属性</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            {{--商品属性名称管理开始--}}
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i>
                                    <span>商品属性名称</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                </a>
                                <ul class="treeview-menu">

                                    <li id="admin-login">
                                        <a href="{{url('admin/attr/add')}}">
                                            <i class="fa fa-circle-o"></i>新增属性名称
                                        </a>
                                    </li>
                                    <li id="admin-login">
                                        <a href="{{url('admin/attr')}}">
                                            <i class="fa fa-circle-o"></i>属性名称展示
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {{--商品属性名称管理结束--}}

                            {{--商品属性值管理开始--}}
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i>
                                    <span>商品属性值</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                </a>
                                <ul class="treeview-menu">

                                    <li id="admin-login">
                                        <a href="{{url('admin/attrval/add')}}">
                                            <i class="fa fa-circle-o"></i>新增属性值
                                        </a>
                                    </li>
                                    <li id="admin-login">
                                        <a href="{{url('admin/attrval')}}">
                                            <i class="fa fa-circle-o"></i>属性值展示
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {{--商品属性值管理结束--}}

                            {{--商品属性开始--}}
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i>
                                    <span>商品属性</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                </a>
                                <ul class="treeview-menu">

                                    <li id="admin-login">
                                        <a href="{{url('admin/sku/add')}}">
                                            <i class="fa fa-circle-o"></i>新增属性
                                        </a>
                                    </li>
                                    <li id="admin-login">
                                        <a href="{{url('admin/sku')}}">
                                            <i class="fa fa-circle-o"></i>属性展示
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {{--商品属性结束--}}
                        </ul>
                    </li>
                    {{--商品属性管理结束--}}
                </ul>
            </li>
            <!-- 商品管理 -->

            <!-- 分类管理 -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>分类管理</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="admin-login">
                        <a href="/admin/category/create" target="iframe">
                            <i class="fa fa-circle-o"></i>新增分类
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="/admin/category" target="iframe">
                            <i class="fa fa-circle-o"></i>分类展示
                        </a>
                    </li>
                </ul>
            </li>
            <!-- 分类管理 -->

            <!-- 导航管理 -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>导航管理</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">
                    <li id="admin-login">
                        <a href="{{url('admin/nav/create')}}">
                            <i class="fa fa-circle-o"></i> 新增导航
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="{{url('admin/nav/index')}}">
                            <i class="fa fa-circle-o"></i> 导航管理
                        </a>
                    </li>
                </ul>
            </li>
            <!-- 导航管理 /-->

            <!-- 角色管理 -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>角色管理</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">
                    <li id="admin-login">
                        <a href="{{url('admin/category/create')}}" target="iframe">
                            <i class="fa fa-circle-o"></i> 角色添加
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="{{url('admin/category')}}" target="iframe">
                            <i class="fa fa-circle-o"></i> 角色管理
                        </a>
                    </li>
                </ul>
            </li>
            <!-- 角色管理 /-->

            <!-- 轮播图管理 -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>轮播图管理</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="{{url('admin/slide/slide_show')}}">
                            <i class="fa fa-circle-o"></i> 轮播图展示
                        </a>
                    </li>
                </ul>
            </li>
            <!-- 轮播图管理 /-->

            <!-- 品牌管理开始 -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>品牌管理</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="{{url('admin/brand/create')}}">
                            <i class="fa fa-circle-o"></i> 品牌添加
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="{{url('admin/brand')}}">
                            <i class="fa fa-circle-o"></i> 品牌列表管理
                        </a>
                    </li>
                </ul>
            </li>
            <!-- 品牌管理管理 -->

            <!-- 用户管理 -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>用户管理</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">
                    <li id="admin-login">
                        <a href="{{url('admin/user/user_show')}}" target="iframe">
                            <i class="fa fa-circle-o"></i> 用户展示
                        </a>
                    </li>
                </ul>
            </li>
            <!-- 用户管理 /-->

            <!-- 友情链接管理 -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>友情链接管理</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                </a>
                <ul class="treeview-menu">
                    <li id="admin-login">
                        <a href="{{url('admin/foot/create')}}">
                            <i class="fa fa-circle-o"></i> 友情链接添加
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="{{url('admin/foot/list')}}">
                            <i class="fa fa-circle-o"></i> 列表管理
                        </a>
                    </li>
                </ul>
            </li>
            <!-- 友情链接管理 /-->

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<!-- 导航侧栏 /-->
