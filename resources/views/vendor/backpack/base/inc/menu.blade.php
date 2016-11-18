<div class="navbar-custom-menu pull-left">
    <ul class="nav navbar-nav">
        <!-- =================================================== -->
        <!-- ========== Top menu items (ordered left) ========== -->
        <!-- =================================================== -->

        <!-- <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li> -->

        <!-- ========== End of top menu left items ========== -->
    </ul>
</div>


<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- ========================================================= -->
      <!-- ========== Top menu right items (ordered left) ========== -->
      <!-- ========================================================= -->

      <!-- <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li> -->

        @if (Auth::guest())
            <li><a href="{{ url(config('backpack.base.route_prefix').'/login') }}"></a></li>
        @else
			<li><a href="{{ url(config('backpack.base.route_prefix').'/xuserprofile/1/edit') }}"><i class="fa fa-btn fa-user"></i>ข้อมูลส่วนตัว</a></li>
            <li><a href="{{ url(config('backpack.base.route_prefix').'/logout') }}"><i class="fa fa-btn fa-sign-out"></i>ออกจากระบบ</a></li>
        @endif

       <!-- ========== End of top menu right items ========== -->
    </ul>
</div>
