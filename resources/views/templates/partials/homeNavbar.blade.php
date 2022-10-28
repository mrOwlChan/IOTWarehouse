<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark px-5">
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
                {{-- User telah Login / ter-authentifikasi --}}
                @include('templates.partials.userNavbar')
            @else
                {{-- User belum Logout / guest --}}
                <ul class="navbar-nav ml-auto">
                    <a class="btn btn-outline-success btn-sm" href="/register"><span class="fas fa-user-plus"></span> Register</a>
                    <a class="btn btn-outline-primary btn-sm ml-2 px-3" href="/login"><span class="fas fa-sign-in-alt"></span> Login</a>
                </ul>
            @endauth
        </div>
    </nav>
</header>

