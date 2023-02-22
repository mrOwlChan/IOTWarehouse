<div class="sidebar mt-3 mb-3">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview {{ Request::is('dashboard') ? 'menu-open' : '' }} ">
                <a href="#" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard v1</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index2.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard v2</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index3.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard v3</p>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Company Menu --}}
            <li class="nav-item has-treeview {{ (Request::is('mycompany') || Request::is('mycompany*')  ? 'menu-open' : '') }}">
                <a href="#" class="nav-link {{ (Request::is('mycompany') || Request::is('mycompany*')  ? 'active' : '') }}">
                    <i class="nav-icon far fa-building mr-1"></i>
                    <p>
                        My Company
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="company/list" class="nav-link {{ (Request::is('company') || Request::is('company/list')  ? 'active' : '') }}">
                            <i class="{{ (Request::is('company') || Request::is('company/list')  ? 'far fa-dot-circle' : 'far fa-circle') }} nav-icon"></i>
                            <p>Company List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index2.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Company Create</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index3.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Company Movements</p>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Warehouse Menu --}}
            <li class="nav-item has-treeview {{ (Request::is('warehouse') || Request::is('warehouse*')  ? 'menu-open' : '') }}">
                <a href="#" class="nav-link {{ (Request::is('warehouse') || Request::is('warehouse*')  ? 'active' : '') }}">
                    <i class="nav-icon fas fa-warehouse"></i>
                    <p>
                        Warehouse
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="warehouse" class="nav-link {{ (Request::is('warehouse') || Request::is('warehouse/create')  ? 'active' : '') }}">
                            <i class="{{ (Request::is('warehouse') || Request::is('warehouse/create')  ? 'far fa-dot-circle' : 'far fa-circle') }} nav-icon"></i>
                            <p>Warehouse List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index2.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Warehouse Stocks</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index3.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Stock Movements</p>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Users --}}
            <li class="nav-item has-treeview {{ (Request::is('myaccount') || Request::is('myaccount*')  ? 'menu-open' : '') }}">
                <a href="#" class="nav-link {{ (Request::is('myaccount') || Request::is('myaccount*')  ? 'active' : '') }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        My Account
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/myaccount/myprofile" class="nav-link {{ (Request::is('myaccount/myprofile') || Request::is('myaccount*')  ? 'active' : '') }}">
                            <i class="{{ (Request::is('myaccount/myprofile') || Request::is('myaccount*')  ? 'far fa-dot-circle' : 'far fa-circle') }} nav-icon"></i>
                            <p>My Profile</p>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="./index2.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Warehouse Stocks</p>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a href="./index3.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Stock Movements</p>
                        </a>
                    </li> --}}
                </ul>
            </li>
            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        Charts
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/charts/chartjs.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ChartJS</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/charts/flot.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Flot</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/charts/inline.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Inline</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="nav-header">EXAMPLES</li> --}}
            {{-- <li class="nav-item">
                <a href="pages/calendar.html" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>
                        Calendar
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a href="pages/gallery.html" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Gallery
                    </p>
                </a>
            </li> --}}
            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-envelope"></i>
                    <p>
                        Mailbox
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/mailbox/mailbox.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Inbox</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/mailbox/compose.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Compose</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/mailbox/read-mail.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Read</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
