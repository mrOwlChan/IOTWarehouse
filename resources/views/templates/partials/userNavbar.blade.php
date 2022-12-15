{{-- 
    Partials ini membutuhkan link:     
    <link rel="stylesheet" href="{{ asset('/assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/AdminLTE/dist/css/adminlte.min.css') }}">
--}}


<ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown pt-1">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-bell fa-lg"></i>
            <span class="badge badge-danger navbar-badge"><i class="fas fa-exclamation-triangle"></i></i></i></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
    </li>
    <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            @if (auth()->user()->photo == '')
                <img src="{{ asset('assets/AdminLTE/dist/img/icons/user-icon-avatar.jpg')}}" class="image img-circle mr-1" style="height:30px; width:30px" alt="User Image">
                <span class="d-none d-md-inline"> {{ auth()->user()->name}}</span>           
            @else
                <img src="{{ asset('storage/'. auth()->user()->photo) }}" class="image img-circle mr-1" style="height:30px; width:30px" alt="User Image">
                <span class="d-none d-md-inline"> {{ auth()->user()->name}}</span>
            @endif
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
                @if (auth()->user()->photo == '')
                    <img src="{{ asset('assets/AdminLTE/dist/img/icons/user-icon-avatar.jpg') }}" class="img-circle elevation-2" alt="User Image">
                @else
                    <img src="{{ asset('storage/'. auth()->user()->photo) }}" class="img-circle elevation-2" alt="User Image">
                @endif
                <p>
                    {{ auth()->user()->name}}
                    <small>{{ auth()->user()->position }}</small>
                </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
                <div class="row">
                    {{-- Jika request selain url: /myprofile --}}
                    @if (!(Request::is('myprofile*')))
                        <div class="col-6 text-center">
                            <a href="/myprofile" class="btn btn-borderless btn-sm p-0 m-0">My Profile</a>
                        </div> 
                        <div class="col-6 text-center">
                            <a href="#" class="btn btn-borderless btn-sm p-0 m-0">Performance</a>
                        </div>
                    
                    {{-- Jika url:/myprofile --}}
                    @else
                        <div class="col-6 text-center">
                            <a href="" class="btn btn-borderless btn-sm disabled p-0 m-0">My Profile</a>
                        </div> 
                        <div class="col-6 text-center">
                            <a href="#" class="btn btn-borderless btn-sm p-0 m-0">Performance</a>
                        </div>
                    @endif
                </div><!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                @if (Request::is('home*') || Request::is('/*'))
                    <a href="/dashboard" class="btn btn-outline-primary btn-sm "><span class="fas fa-bars m-1"></span>Warehouse</a>
                @else
                    <a href="/dashboard" class="btn btn-outline-primary btn-sm disabled"><span class="fas fa-bars m-1"></span>Warehouse</a>
                @endif
                <form action="/logout" method="post" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm float-right px-3"><span class="fas fa-sign-out-alt m-1"></span>Logout</button>
                </form> 
            </li>
        </ul>
    </li>
</ul>