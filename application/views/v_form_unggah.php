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
                        <h1 class="welcome-text"><span class="text-black fw-bold">Arsip Surat >> Unggah</span></h1>
                        <h3 class="welcome-sub-text">Unggah surat yang telah terbit pada form ini untuk diarsipkan.
                            Catatan: Gunakan file berformat PDF.</h3>
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

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">

                                    <form class="forms-sample" method="post" enctype="multipart/form-data" action="<?php echo base_url() . 'Arsip_surat/tambah'; ?>">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"><b>Nomor Surat</b></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="no_surat">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"><b>Kategori</b></label>
                                            <div class="col-sm-6">
                                                <select class="form-select" aria-label="Default select example" name="kategori">
                                                    <option value="Undangan">Undangan</option>
                                                    <option value="Pengumuman">Pengumuman</option>
                                                    <option value="Nota Dinas">Nota Dinas</option>
                                                    <option value="Pemberitahuan">Pemberitahuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"><b>Judul</b></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="judul">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"><b>File Surat (PDF)</b></label>
                                            <div class="col-sm-6">
                                                <input type="file" class="form-control-file" name="file_surat">
                                            </div>
                                        </div>

                                        <a href="<?= base_url('Arsip_surat'); ?>" class="btn btn-primary btn-icon-text me-2">
                                            << Kembali</a>
                                                <button class="btn btn-warning btn-icon-text me-2" type="submit">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>