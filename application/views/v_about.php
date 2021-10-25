<body>
    <div class="container-scroller">

        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo">
                        <h3>Menu</h3>
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text"><span class="text-black fw-bold">About</span></h1>
                    </li>
                </ul>

                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>

        <div class="container-fluid page-body-wrapper">

            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Arsip_surat'); ?>">
                            <i class="menu-icon mdi mdi-star"></i>
                            <span class="menu-title">Arsip</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('About'); ?>">
                            <i class="menu-icon mdi mdi-information"></i>
                            <span class="menu-title">About</span>
                        </a>
                    </li>
                </ul>
            </nav>


            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-4">
                                            <img src="<?php echo base_url() . 'assets/images/profil.png' ?>" style="width: 110px; height: 150px" alt="profil">
                                        </div>
                                        <div class="col">
                                            <h5 class="card-title">Aplikasi ini dibuat oleh:</h5>
                                            <p>Nama : Arfia Latifah</p>
                                            <p>NIM: 1831710127</p>
                                            <p>Tanggal: 23 Oktober 2021</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>