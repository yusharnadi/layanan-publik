<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{route('dashboard')}}"><img class="mr-1" src="{{asset('assets/img/logo-yanlik.jpeg')}}" alt="Logo Pemkot Singkawang" srcset="" height="50px">
        {{config('app.name')}}
      </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{route('dashboard')}}">
        <img src="{{asset('assets/img/logo-yanlik.jpeg')}}" alt="Logo Pemkot" srcset="" height="50px">
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="{{set_active('dashboard')}}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-laptop"></i><span>Dashboard</span></a></li>
      
      @can("read user")
      <li class="menu-header">Transaction Data</li>
      @endcan

      @can("read laporan")
      <li class="{{set_active('laporan.*')}}"><a class="nav-link" href="{{ route('laporan.index') }}"><i class="fas fa-book"></i><span>Laporan</span></a></li>
      @endcan

      @can("read monev")
      <li class="{{set_active('evaluasi.*')}}"><a class="nav-link" href="{{ route('evaluasi.index') }}"><i class="fas fa-vote-yea"></i><span>Monev</span></a></li>
      @endcan

      @can("read rencana")
      <li class="{{set_active('rencana.*')}}"><a class="nav-link" href="{{ route('rencana.index') }}"><i class="fas fa-clipboard-list"></i><span>Rencana Aksi</span></a></li>
      @endcan

      @can("read tindak")
      <li class="{{set_active('tindak.*')}}"><a class="nav-link" href="{{ route('tindak.index') }}"><i class="fas fa-walking"></i><span>Tindak Lanjut </span></a></li>
      @endcan

      @can("read penilaian")
      <li class="{{set_active('penilaian.*')}}"><a class="nav-link" href="{{ route('penilaian.index') }}"><i class="fas fa-poll"></i><span>Penilaian </span></a></li>
      @endcan

      @can("read verifikasi penilaian")
      <li class="{{set_active('verifikasi.*')}}"><a class="nav-link" href="{{ route('verifikasi.index') }}"><i class="fas fa-file-signature"></i><span>Verifikasi Penilaian </span></a></li>
      @endcan

      @can("read hasil penilaian")
      <li class="{{set_active('hasil.*')}}"><a class="nav-link" href="{{ route('hasil.index') }}"><i class="fas fa-sort-alpha-up"></i><span>Hasil Penilaian </span></a></li>
      @endcan

      @can("read user")
      <li class="menu-header">Master Data</li>
      @endcan

      @can("read aspect")
      <li class="{{set_active('aspects.*')}}"><a class="nav-link" href="{{ route('aspects.index') }}"><i class="fas fa-tasks"></i><span>Aspek</span></a></li>
      @endcan

      @can("read indicator")
      <li class="{{set_active('indicator.*')}}"><a class="nav-link" href="{{ route('indicator.index') }}"><i class="far fa-lightbulb"></i><span>Indikator</span></a></li>
      @endcan

      @can("read department")      
      <li class="{{set_active('department.*')}}"><a class="nav-link" href="{{ route('department.index') }}"><i class="far fa-building"></i><span>Department</span></a></li>
      @endcan

      @can("read user")  
      <li class="{{set_active('users.*')}}"><a class="nav-link" href="{{ route('users.index') }}"><i class="far fa-user"></i><span>Users</span></a></li>
      @endcan

      @can("read role")  
      <li class="{{set_active('role.*')}}"><a class="nav-link" href="{{ route('role.index') }}"><i class="fas fa-user-tag"></i><span>Role</span></a></li>
      @endcan
    </ul>
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="{{ route('logout') }}" class="btn btn-danger btn-lg btn-block btn-icon-split">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
    </div>
  </aside>
</div>