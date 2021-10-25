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
                        <h1 class="welcome-text"><span class="text-black fw-bold">Arsip Surat</span></h1>
                        <h3 class="welcome-sub-text">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.
                            Klik "Lihat" pada kolom aksi untuk menampilkan surat.</h3>
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

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Cari surat:</b></label>
                                        <div class="col-sm-6">
                                            <form action="" method="POST">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Search" name="keyword">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary btn-sm" type="submit">Cari</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <?php if (empty($arsip)) : ?>
                                        <div class="alert alert danger" role="alert">
                                            Arsip surat tidak ditemukan
                                        </div>
                                    <?php endif; ?>

                                    <?php echo $this->session->flashdata('message'); ?>
                                    <div class="table-responsive pt-1">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="table-light">
                                                    <th>Nomor Surat</th>
                                                    <th>Kategori</th>
                                                    <th>Judul</th>
                                                    <th>Waktu Pengarsipan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($arsip as $a) {
                                                ?>
                                                    <tr>
                                                        <td><?= $a['no_surat']; ?></td>
                                                        <td><?= $a['kategori']; ?></td>
                                                        <td><?= $a['judul']; ?></td>
                                                        <td><?= date('Y-m-d H:i', strtotime($a['waktu_pengarsipan'])); ?></td>
                                                        <td>
                                                            <a class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus arsip surat ini?');" <?php echo anchor('Arsip_surat/hapus/' . $a['id_surat'], 'Hapus'); ?></a>
                                                                <a class="btn btn-warning btn-sm" href="<?php echo base_url() . 'Arsip_surat/download/' . $a['id_surat']; ?>">Unduh</a>
                                                                <a class="btn btn-info btn-sm" <?php echo anchor('Arsip_surat/detail_surat/' . $a['id_surat'], 'Lihat>>'); ?></a>

                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="<?= base_url('Arsip_surat/form_unggah'); ?>" class="btn btn-primary text-white me-0">Arsipkan Surat</a>
                        </div>


                    </div>
                </div>