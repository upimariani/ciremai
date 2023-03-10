<body>


    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
        <div class="container">
            <div class="site-navigation">
                <a href="index.html" class="logo m-0">PENDAKIAN GUNUNG CIREMAI <span class="text-primary">.</span></a>

                <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
                    <li class="active"><a href="<?= base_url('Pendaki/cHalamanUtama') ?>">Home</a></li>
                    <?php
                    if ($this->session->userdata('id') != '') {
                    ?>
                        <li class="has-children">
                            <a href="#">Transaksi</a>
                            <ul class="dropdown">
                                <li><a href="<?= base_url('Pendaki/cGuidePorter') ?>">Boking Guide dan Porter</a></li>
                                <li><a href="<?= base_url('Pendaki/cAlatPendakian') ?>">Sewa Alat Pendakian</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#">Transaksi Saya</a>
                            <ul class="dropdown">
                                <li><a href="<?= base_url('Pendaki/cTransaksiSaya/boking') ?>">Boking</a></li>
                                <li><a href="<?= base_url('Pendaki/cTransaksiSaya') ?>">Sewa</a></li>
                            </ul>
                        </li>
                        <!-- <li><a href="about.html">Profil</a></li> -->
                    <?php
                    }
                    ?>

                    <?php
                    if ($this->session->userdata('id') == '') {
                    ?>
                        <li><a href="<?= base_url('pendaki/cauth') ?>">Login</a></li>
                    <?php
                    } else {
                    ?>
                        <li><a href="<?= base_url('pendaki/cauth/logout') ?>">Logout</a></li>
                    <?php
                    }
                    ?>

                </ul>

                <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>

            </div>
        </div>
    </nav>