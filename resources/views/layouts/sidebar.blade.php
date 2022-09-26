<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{route('dashboard')}}"><img class="mr-1" src="{{asset('assets/img/logo-skw-150.png')}}" alt="Logo Pemkot Singkawang" srcset="" height="50px">
        {{config('app.name')}}
      </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{route('dashboard')}}">
        <img src="{{asset('assets/img/logo-skw-150.png')}}" alt="Logo Pemkot" srcset="" height="50px">
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="{{set_active('dashboard')}}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-laptop"></i><span>Dashboard</span></a></li>
      <li class="menu-header">Transaction Data</li>


      <li class="menu-header">Master Data</li>
      <li class="{{set_active('indicator.*')}}"><a class="nav-link" href="{{ route('indicator.index') }}"><i class="far fa-lightbulb"></i><span>Indikator</span></a></li>
      <li class="{{set_active('users.*')}}"><a class="nav-link" href="{{ route('users.index') }}"><i class="far fa-user"></i><span>Users</span></a></li>
      
    </ul>
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="{{ route('logout') }}" class="btn btn-danger btn-lg btn-block btn-icon-split">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
    </div>
  </aside>
</div>