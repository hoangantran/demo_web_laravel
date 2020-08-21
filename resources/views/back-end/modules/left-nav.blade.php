<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{ url('admin/home') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/danhmuc') }}">
                        <i class="fa fa-bullhorn"></i>
                        <span>Quản lý Danh Mục</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/sanpham/all') }}">
                        <i class="fa fa-bullhorn"></i>
                        <span>Quản lý Sản Phẩm</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/donhang') }}">
                        <i class="fa fa-bullhorn"></i>
                        <span>Quản lý Đơn Hàng </span>
                    </a>
                </li>
 
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>Quản lý Admin</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url('admin/nhanvien') }}">Danh Sách Nhân Viên</a></li>
						<li><a href="{{ url('admin/nhanvien/add') }}">Thêm Nhân Viên</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('getindex') }}">
                        <i class="fa fa-user"></i>
                        <span>Cửa Hàng</span>
                    </a>
                </li>
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->