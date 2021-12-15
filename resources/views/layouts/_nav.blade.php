<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">

                <div class="profile-name">
                    <p class="name">
                         {{Auth::user()->name}}
                    </p>
                    <p class="designation">
                        {{Auth::user()->email}}
                    </p>
                </div>
            </div>
        </li>
        @if(Auth::user()->type == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @endif
        @if(Auth::user()->type == 'admin')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#page-layouts1" aria-expanded="false"
                    aria-controls="page-layouts">
                    <i class="fas fa-chart-line menu-icon"></i>
                    <span class="menu-title">Reportes</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="page-layouts1">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="{{route('reports.day')}}">Reportes por día</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('reports.date')}}">Reportes por fecha</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endif
        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'Empresa')
        <li class="nav-item">
            <a class="nav-link" href="{{route('categories.index')}}">
                <i class="fas fa-building menu-icon"></i>
                <span class="menu-title"> Compañías</span>
            </a>
        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="{{route('offers.index')}}">
                <i class="fas fa-briefcase menu-icon"></i>
                <span class="menu-title">Ofertas</span>
            </a>
        </li>
        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'Estudiante')
        <li class="nav-item">
            <a class="nav-link" href="{{route('providers.index')}}">
                <i class="fas fa-user-graduate menu-icon"></i>
                <span class="menu-title">Estudiantes</span>
            </a>
        </li>
        @endif
        @if(Auth::user()->type == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{route('users.index')}}">
                    <i class="fas fa-user-tag menu-icon"></i>
                    <span class="menu-title">Usuarios</span>
                </a>
            </li>
        @endif
        {{--<li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fas fa-cogs menu-icon"></i>
                <span class="menu-title">Configuración</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('business.index')}}">Empresa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('printers.index')}}">Impresora</a>
                    </li>
                </ul>
            </div>
        </li>--}}
    </ul>
</nav>