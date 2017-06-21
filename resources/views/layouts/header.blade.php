<header class="main-header">
  <a href="{{url('')}}/dashboard" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>SI</b>PRMS</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>SI</b>PMO&RMS</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{url('')}}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs">
              @if(Auth::check())
                {{Auth::user()->name}}
              @endif
            </span>
          </a>
          <ul class="dropdown-menu">
            <li clasimgs="user-header">
              <img src="{{url('')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              <p>
                Fathihah Ulya - 5114100076
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="pages/profile.html" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="../" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        </ul>
      </div>
    </nav>
  </header>