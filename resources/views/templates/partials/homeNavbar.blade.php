<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">IOTWarehouse</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            @auth
            {{-- Jika TELAH login --}}
            <ul>
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('/assets/AdminLTE/dist/img/user2-160x160.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline">Alexander Pierce</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="{{ asset('/assets/AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                            <p>
                                Alexander Pierce - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li><!-- /.user image -->
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li><!-- /.menu body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                            <ul class="navbar-nav ml-auto">
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        @method('post')
                                        <button type="submit" class="btn btn-outline-danger btn-sm my-2 my-sm-0" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li><!-- /.menu footer-->
                    </ul>
                </li>
            </ul>         
            @else 
            {{-- Jika BELUM Login (guest) --}}
                <ul class="navbar-nav ml-auto">
                    <li class="mr-3">
                        <a href="/login" class="btn btn-outline-primary btn-sm my-2 my-sm-0 px-3" type="submit">Login</a>
                    </li>
                    <li>
                        <a href="/register" class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit">Register</a>
                    </li>
                </ul>
            @endauth
        </div>
    </nav>

</header>

