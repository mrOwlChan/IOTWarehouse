{{-- 
    Partials ini membutuhkan link:     
    <link rel="stylesheet" href="{{ asset('/assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/AdminLTE/dist/css/adminlte.min.css') }}">
--}}



<ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <img src="{{ asset('assets/AdminLTE/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            Brad Diesel
                            <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">Call me whenever you can...</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                </div>
            <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <img src="{{ asset('assets/AdminLTE/dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            John Pierce
                            <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">I got your message bro</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                </div>
            <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <img src="{{ asset('assets/AdminLTE/dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            Nora Silvester
                            <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">The subject goes here</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                </div>
            <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
    </li> --}}
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown pt-1">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-bell"></i>
            <span class="badge badge-danger navbar-badge">15</span>
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
            {{-- @if (auth()->user()->photo == '')
                <img src="{{ asset('assets/images/icons/user-icon-avatar.jpg')}}" class="image img-circle" style="height:25px" alt="User Image">
                <span class="d-none d-md-inline"> {{ auth()->user()->name}}</span>
                
            @else
                <img src="{{ asset('storage/'. auth()->user()->photo) }}" class="image img-circle" style="height:25px" alt="User Image">
                <span class="d-none d-md-inline"> {{ auth()->user()->name}}</span>
            @endif --}}
            <img src="{{ asset('/assets/AdminLTE/dist/img/user2-160x160.jpg') }}" class="image img-circle" style="height:25px" alt="User Image">
            <span class="d-none d-md-inline"> {{ auth()->user()->name}}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
                {{-- <img src="{{ asset('storage/'. auth()->user()->photo) }}" class="img-circle elevation-2" alt="User Image"> --}}
                <img src="{{ asset('/assets/AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                <p>
                    {{ auth()->user()->name}}
                    <small>{{ auth()->user()->position }}</small>
                </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
                <div class="row">
                    {{-- Jika request selain url: /user --}}
                    @if (!(Request::is('user*')))
                        <div class="col-6 text-center">
                            <a href="/user" class="btn btn-borderless btn-sm p-0 m-0">My Profile</a>
                        </div> 
                        <div class="col-6 text-center">
                            <a href="#" class="btn btn-borderless btn-sm p-0 m-0">Performance</a>
                        </div>
                    
                    {{-- Jika url:/user --}}
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