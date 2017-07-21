<header class="main-header">
  <a href="{{url('')}}/dashboard" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>SI</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>SIMPANG BI</b></span>
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
              <span class="hidden-xs">
              @if(Auth::check())
                {{Auth::user()->name}}
              @else
                <img src="{{url('')}}/icon/lock.png" height="10px" width="10px">
              @endif</span>
            </a>
            @if(Auth::check())
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                @if(is_null(Auth::user()->image_path))
                <img src="{{url('')}}/icon/account.png" class="img-circle" alt="User Image">
                @else
                  <img src="{{url('')}}/{{Auth::user()->image_path}}" alt="User Image">
                @endif
                <p>
                  {{Auth::user()->name}}
                  <small>{{Auth::user()->nip}}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('')}}/edit-profile" class="btn btn-default btn-flat">Edit Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
            @else
              <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                  Anda harus login terlebih dahulu.
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('')}}/autentikasi" class="btn btn-default btn-flat">Login</a>
                </div>
                {{-- <div class="pull-right">
                  <a href="{{url('')}}/logout" class="btn btn-default btn-flat">Sign out</a>
                </div> --}}
              </li>
            </ul>
            @endif
          </li>
        </ul>
      </div>
    </nav>
  </header>