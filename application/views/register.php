<!-- Meta -->
<?php $this->load->view('dashboard/layout/meta.php') ?>

</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="<?php echo base_url('index.php') ?>" class="logo d-flex align-items-center w-auto">
                                    <img src="<?php echo base_url('niceadmin') ?>/assets/img/logo-baru.png" alt="">
                                    <span class="d-none d-lg-block">Need A-Car</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Buat Akun Baru</h5>
                                        <p class="text-center small">Masukkan data lengkap anda</p>
                                    </div>

                                    <!-- needs-validation -->
                                    <form class="row g-3" method='post' action="<?= base_url('index.php') ?>/Auth/register">

                                        <div class="col-12">
                                            <label for="username" class="form-label">Nama Lengkap</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="username" class="form-control" id="username" value="<?= set_value('username') ?>">
                                            </div>
                                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                        </div>

                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="input-group">
                                                <input type="email" name="email" class="form-control" id="email" value="<?= set_value('email') ?>">
                                            </div>
                                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                        </div>


                                        <div class=" col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="input-group">
                                                <input type="password" name="password" class="form-control" id="password">
                                            </div>
                                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                        </div>

                                        <div class="col-12">
                                            <label for="password_valid" class="form-label">Ulangi Password</label>
                                            <div class="input-group">
                                                <input type="password" name="password_valid" class="form-control" id="password_valid">
                                            </div>
                                            <?= form_error('password_valid', '<small class="text-danger">', '</small>') ?>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value="terms" id="acceptTerms">
                                                <label class="form-check-label" for="acceptTerms">Saya setuju dan menerima
                                                    <a href="#">syarat dan ketentuan</a></label>
                                            </div>
                                            <?= form_error('terms', '<small class="text-danger">', '</small>') ?>
                                        </div>


                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Sudah punya akun? Silahkan <a href="<?php echo base_url('index.php') ?>/Login">Log in</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                Designed by <strong>Need</strong> A-Car
                            </div>
                            <?php
                            ?>
                            <?php
                            if ($this->session->has_userdata('username')) {
                            ?>
                            <div>Back to <a href='<?php echo base_url("index.php") ?>/Dashboard'>Dashboard</a></div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Script -->
    <?php $this->load->view('dashboard/layout/script.php') ?>