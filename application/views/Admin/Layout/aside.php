<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-warning elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url('asset/logo.jpeg') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GUNUNG CIREMAI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            </div>
            <div class="info">
                <a href="#" class="d-block">ADMIN</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('Admin/cDashboard') ?>" class="nav-link   <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cDashboard') {
                                                                                        echo 'active';
                                                                                    }  ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cDataMaster') {
                                                        echo 'menu-open';
                                                    }  ?>">

                    <a href="#" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cDataMaster') {
                                                    echo 'active';
                                                }  ?>">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Kelola Data Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cDataMaster/user') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cDataMaster' && $this->uri->segment(3) == 'user') {
                                                                                                    echo 'active';
                                                                                                }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cDataMaster/jasa') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cDataMaster' && $this->uri->segment(3) == 'jasa') {
                                                                                                    echo 'active';
                                                                                                }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jasa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cDataMaster/alat') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cDataMaster' && $this->uri->segment(3) == 'alat') {
                                                                                                    echo 'active';
                                                                                                }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Alat</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cTransaksi') {
                                                        echo 'menu-open';
                                                    }  ?>">

                    <a href="#" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cTransaksi') {
                                                    echo 'active';
                                                }  ?>">
                        <i class="nav-icon fas fa-feather"></i>
                        <p>
                            Transaksi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cTransaksi/boking') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cTransaksi' && $this->uri->segment(3) == 'boking') {
                                                                                                        echo 'active';
                                                                                                    }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Boking Guide dan Porter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cTransaksi/sewa') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cTransaksi' && $this->uri->segment(3) == 'sewa') {
                                                                                                    echo 'active';
                                                                                                }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sewa Alat Pendakian</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-item">
                    <a href="<?= base_url('ControllerTransaksi') ?>" class="nav-link   <?php if ($this->uri->segment(1) == 'ControllerTransaksi') {
                                                                                            echo 'active';
                                                                                        }  ?>">
                        <i class="nav-icon fas fa-barcode"></i>
                        <p>Transaksi</p>
                    </a>
                </li> -->
                <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cPembatalan') {
                                                        echo 'menu-open';
                                                    }  ?>">

                    <a href="#" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cPembatalan') {
                                                    echo 'active';
                                                }  ?>">
                        <i class="nav-icon fas fa-times"></i>
                        <p>
                            Pembatalan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cPembatalan/pembatalan') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cPembatalan' && $this->uri->segment(3) == 'pembatalan') {
                                                                                                            echo 'active';
                                                                                                        }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pembatalan Sewa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cPembatalan/pembatalan_boking') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cPembatalan' && $this->uri->segment(3) == 'pembatalan_boking') {
                                                                                                                    echo 'active';
                                                                                                                }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pembatalan Boking</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('Admin/cLogin/logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>SignOut</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>