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
                        <a href="goods_edit.html">
                            <i class="fa fa-circle-o"></i> 新增商品
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="goods.html">
                            <i class="fa fa-circle-o"></i> 商品管理
                        </a>
                    </li>
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
                        <a href="{{url('admin/category/create')}}">
                            <i class="fa fa-circle-o"></i> 新增分类
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="goods.html">
                            <i class="fa fa-circle-o"></i> 分类管理
                        </a>
                    </li>
                </ul>
            </li>
            <!-- 分类管理 /-->

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
                            <i class="fa fa-circle-o"></i> 品牌管理
                        </a>
                    </li>
                </ul>
            </li>
            <!-- 品牌管理管理 -->

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