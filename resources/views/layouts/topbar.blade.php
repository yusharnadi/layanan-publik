@php
    $carbon = new Carbon\Carbon;
@endphp
<ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
    <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
      <div class="d-sm-none d-lg-inline-block">Hi, {{ (auth()->user()) ? auth()->user()->name : ''}}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title">Login {{$carbon->diffForHumans(session('login_time'))}}</div>
        <div class="dropdown-divider"></div>
        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </li>
  </ul>