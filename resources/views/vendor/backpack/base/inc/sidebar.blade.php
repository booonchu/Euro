@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="http://placehold.it/160x160/00a65a/ffffff/&text={{ Auth::user()->firstname[0] }}" class="img-circle" alt="User Image">
          </div>
          <div class="info">
            <p>{{ Auth::user()->firstname }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
		  <li class="header">Admin Menu</li>
		  <li><a href="{{ url('admin/school') }}"><i class="fa fa-tag"></i><span>โรงเรียน</span></a></li>
		  <li><a href="{{ url('admin/coursecategory') }}"><i class="fa fa-tag"></i><span>กลุ่มวิชา</span></a></li>
		  <li><a href="{{ url('admin/course') }}"><i class="fa fa-tag"></i><span>วิชา</span></a></li>
		  <li><a href="{{ url('admin/teacheradmin') }}"><i class="fa fa-tag"></i><span>การอนุมัติวิชาสอน</span></a></li>
		  <li><a href="{{ url('admin/xuser') }}"><i class="fa fa-tag"></i><span>ผู้ใช้</span></a></li>
		  <li><a href="{{ url('admin/report') }}"><i class="fa fa-tag"></i><span>รายงาน</span></a></li>
		  <li class="header">User Menu</li>
		  <li><a href="{{ url('admin/student') }}"><i class="fa fa-tag"></i><span>นักเรียน</span></a></li>
		  <li><a href="{{ url('admin/teacher') }}"><i class="fa fa-tag"></i><span>อาจารย์</span></a></li>
		  <li><a href="{{ url('admin/room') }}"><i class="fa fa-tag"></i><span>ห้องเรียน</span></a></li>
		  <li><a href="{{ url('admin/holiday') }}"><i class="fa fa-tag"></i><span>วันหยุด</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
