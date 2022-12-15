<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Log in</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('/assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
        
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{ asset('/assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('/assets/AdminLTE/dist/css/adminlte.min.css') }}">
    </head>
    <body class="hold-transition login-page">
        {{-- Home Navbar --}}
        @include('templates.partials.homeNavbar'){{-- /.home navbar --}}

        <div class="container">
            {{-- Alert Registrasi Berhasil --}}
            @if (session()->has('reg_success'))
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('reg_success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>    
                    </div>
                </div>
            @endif{{-- /. alert registrasi berhasil --}}

            {{-- Alert Gagal Login --}}
            @if (session()->has('login_falied'))
                <div class="row">
                    <div class="col-md-4 mx-auto">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('login_falied') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>    
                    </div>
                </div>
            @endif{{-- /. alert gagal login --}}
        </div>

        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html"><i class="fas fa-warehouse mr-2"></i><b>IOT</b>Warehouse</a>
            </div>

            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Login untuk masuk ke akun</p>
                    <form action="/login" method="post">
                        @csrf
                        @method('post')
                        <div class="input-group mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" id="email" value="{{ old('email') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                                <div id="" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('email')
                                <div id="" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-8">
                                {{-- <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div> --}}

                                <p class="mb-0">
                                    <a href="/register" class="text-center">Register a new membership</a>
                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        <!-- /.col -->
                        </div>
                    </form>

                    {{-- <div class="social-auth-links text-center mb-3">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                        </a>
                    </div><!-- /.social-auth-links --> --}}
                    {{-- <p class="mb-1">
                        <a href="forgot-password.html">I forgot my password</a>
                    </p> --}}
                    
                </div><!-- /.login-card-body -->
            </div>
        </div><!-- /.login-box -->

        <!-- jQuery -->
        <script src="{{ asset('/assets/AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
        
        <!-- Bootstrap 4 -->
        <script src="{{ asset('/assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        
        <!-- AdminLTE App -->
        <script src="{{ asset('/assets/AdminLTE/dist/js/adminlte.min.js') }}"></script>
    </body>
</html>
