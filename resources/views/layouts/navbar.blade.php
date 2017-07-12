<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{url('')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>
          @if(Auth::check())
          {{Auth::user()->name}}
          @endif
        </p>
        <small>
          @if(Auth::check())
          {{Auth::user()->nip}}
          @endif
        </small>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>
      <li>
        <a href="{{url('')}}/dashboard">
          <i class="fa fa-home"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="{{url('')}}/list-proyek">
          <i class="fa fa-cubes"></i> <span>Proyek</span>
        </a>
      </li>
      <li>
        <a href="{{url('')}}/report-anggaran-tahunan">
          <i class="fa fa-money"></i> <span>Anggaran</span>
        </a>
      </li>
      <li>
        <a href="{{url('')}}/list-issue">
          <i class="fa fa-newspaper-o"></i> <span>Issues</span>
        </a>
      </li>
      <li>
        <a href="{{url('')}}/list-arsip-tahun">
          <i class="fa fa-file"></i> <span>Arsip</span>
        </a>
      </li>
    </ul>
  </section>
</aside>