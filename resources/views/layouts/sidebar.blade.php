<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{asset('images/icon/logo.png')}}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class=" has-sub">
                    <a class="nav-link {{set_active('/')}}" href="#">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a class="nav-link {{set_active('/')}}" href="{{url('/')}}">
                        <i class="fas fa-table"></i>ARSIP</a>
                </li>
                <li>
                    <a class="nav-link {{set_active('/about')}}" href="{{url('/about')}}">
                        <i class="far fa-check-square"></i>ABOUT</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>