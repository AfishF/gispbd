<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= base_url('home'); ?>">GIS | PBD</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <img src="<?= base_url('assets/img/logo_puskesmas.png') ?>" width="70%" height="70%" style="margin-left: 30px; margin-top: 15px;">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="<?= base_url('home'); ?> ">
                            <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                            Home
                        </a>
                        <a class="nav-link" href="<?= base_url('tabel'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Data Puskesmas
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>