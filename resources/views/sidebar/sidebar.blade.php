<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <p class="brand-link" style="background: #1c478e">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="color: #fff !important;">Kutayarisha</span>
    </p>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user1-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">

                    {{ Auth::user()->name }}
                </a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin </p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fa fa-credit-card"></i>
                        <p>
                             Payments
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('payments.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Payments</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fa fa-binoculars"></i>
                        <p>
                             Baby Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buy Products</p>
                            </a>
                        </li>



                    </ul>
                </li>

                <!--products-->
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fa fa-lemon-o"></i>
                        <p>
                             Foods
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Foods</p>
                            </a>
                        </li>



                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
