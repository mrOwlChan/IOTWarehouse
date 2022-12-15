<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IOTWarehouse | Warehouse Panel</title>

        <!-- jQuery -->
        <script src="{{ asset('assets/AdminLTE/plugins/jquery/jquery.min.js')}}"></script>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
       
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
       
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
       
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
       
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
       
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/jqvmap/jqvmap.min.css') }}">
       
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/AdminLTE/dist/css/adminlte.min.css') }}">
       
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
       
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">
       
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/summernote/summernote-bs4.min.css') }}">

        {{-- Icon Title --}}
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/AdminLTE/dist/img/icons/warehouse_icon.png') }}">   

        {{-- Link to Other Libraries or CSS--}}
        @yield('libsOnHeader')

    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="/home" class="nav-link"><span class="fas fa-home"></span> Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link"><span class="fas fa-info-circle"></span> About</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                @include('templates.partials.userNavbar')

            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="{{ asset('assets/AdminLTE/dist/img/icons/warehouse_icon.png') }}" alt="GudangApp Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light"><b>IOT</b>Warehouse</span>
                </a>

                <!-- Sidebar -->
                    @include('templates.partials.sideMainNavbar')
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    @yield('contentHeader')
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        @yield('mainContent')
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>

            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2021-2022. MeowChan</strong>
                <div class="float-right d-none d-sm-inline-block">
                    Powered By<b><a href="https://adminlte.io"> AdminLTE.io</a> version</b> 3.1.0-pre
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        {{-- <!-- jQuery -->
        <script src="assets/AdminLTE/plugins/jquery/jquery.min.js"></script> --}}
        
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('assets/AdminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        
        <!-- ChartJS -->
        <script src="{{ asset('assets/AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>
        
        <!-- Sparkline -->
        <script src="{{ asset('assets/AdminLTE/plugins/sparklines/sparkline.js') }}"></script>
        
        <!-- JQVMap -->
        <script src="{{ asset('assets/AdminLTE/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('assets/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('assets/AdminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        
        <!-- daterangepicker -->
        <script src="{{ asset('assets/AdminLTE/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('assets/AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
        
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('assets/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        
        <!-- Summernote -->
        <script src="{{ asset('assets/AdminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
        
        <!-- overlayScrollbars -->
        <script src="{{ asset('assets/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/AdminLTE/dist/js/adminlte.js') }}"></script>
        
        {{-- Link to Other Libraries --}}
        @yield('libsOnFooter')
    </body>
</html>
