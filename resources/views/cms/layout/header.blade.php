<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                @if (Auth::check())
                    <img src="{{ Auth::user()->avatar ?? asset('unimg.jpg') }}" alt=""
                         style="width: 20px; object-fit: cover;">
                    {{ Auth::user()->name }}
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="min-width: 105px !important;">
                <a href="{{ route('admin.logout') }}" class="dropdown-item dropdown-footer btn btn-danger">Đăng xuất</a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
