<!-- Meta -->
<?php $this->load->view('landing_page/layout/meta.php') ?>

<!-- Header -->
<?php $this->load->view('landing_page/layout/navbar.php') ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Sewa Mobil</h2>
                <ol>
                    <li><a href="<?= base_url('index.php') ?>">Home</a></li>
                    <li>Sewa Mobil</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="<?= base_url('img/frontend_mobil/' . $gambar1) ?>" alt="">
                            </div>

                            <div class="swiper-slide">
                                <img src="<?= base_url('img/frontend_mobil/' . $gambar2) ?>" alt="">
                            </div>

                            <div class="swiper-slide">
                                <img src="<?= base_url('img/frontend_mobil/' . $gambar3) ?>" alt="">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Informasi Mobil</h3>
                        <ul>
                            <li><strong>Kategori</strong> : <?= $kategori ?></li>
                            <li><strong>Produk </strong>: <?= $produk ?></li>
                            <li><strong>Merk </strong>: <?= $merk_mobil ?></li>
                            <li><strong>Sewa Mobil Pilihan Anda Sekarang!</strong></li>
                        </ul>
                    </div>

                    <?= $this->session->flashdata('message') ?>
                    <div class="portfolio-description">
                        <h3 class="mb-4">Form Sewa Mobil :</h3>
                        <!-- Fom Update -->
                        <form method='post' action="<?= base_url('index.php') ?>/Landing_page/Sewa_mobil/save">
                            <input type="hidden" name="id" 
                            <?php
                                if(!empty($this->session->userdata["id"])) {
                                    echo "value='".$this->session->userdata["id"]."'";
                                }
                            ?>>

                            <!-- Merk Id -->
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Pilih Merk</legend>
                                <div class="col-sm-8">
                                    <?php
                                    foreach ($mobil as $range) {
                                    ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="mobil_id" id="gridRadios<?= $range->id ?>" value="<?= $range->id ?>">
                                            <label class="form-check-label" for="gridRadios<?= $range->id ?>">
                                                <?php
                                                foreach ($merk as $objmerk) {
                                                    if ($range->merk_id == $objmerk->id) {
                                                        echo '<td>' . $objmerk->nama . ' ' . $objmerk->produk . ' (' . $range->nopol . ')</td>';
                                                        break;
                                                    }
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?= form_error('mobil_id', '<small class="text-danger">', '</small>') ?>
                            </fieldset>

                            <!-- No. KTP -->
                            <div class="row mb-3">
                                <label for="noktp" class="col-md-4 col-lg-3 col-form-label">No. KTP</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="noktp" type="text" class="form-control" id="noktp" value="<?= set_value('noktp') ?>">
                                </div>
                                <?= form_error('noktp', '<small class="text-danger">', '</small>') ?>
                            </div>

                            <!-- Tanggal Mulai -->
                            <div class="row mb-3">
                                <label for="mulai" class="col-md-4 col-lg-3 col-form-label">Tanggal Mulai</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="mulai" type="date" class="form-control" id="mulai" value="<?= set_value('mulai') ?>">
                                </div>
                                <?= form_error('mulai', '<small class="text-danger">', '</small>') ?>
                            </div>

                            <!-- Tanggal Selesai -->
                            <div class="row mb-3">
                                <label for="akhir" class="col-md-4 col-lg-3 col-form-label">Tanggal Selesai</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="akhir" type="date" class="form-control" id="akhir" value="<?= set_value('akhir') ?>">
                                </div>
                                <?= form_error('akhir', '<small class="text-danger">', '</small>') ?>
                            </div>

                            <!-- Tujuan -->
                            <div class="row mb-3">
                                <label for="tujuan" class="col-md-4 col-lg-3 col-form-label">Tujuan Anda</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="tujuan" type="text" class="form-control" id="tujuan" value="<?= set_value('tujuan') ?>">
                                </div>
                                <?= form_error('tujuan', '<small class="text-danger">', '</small>') ?>
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" onclick="if(!confirm('Apakah data yang anda masukkan sudah benar?')) {return false}">Sewa Sekarang!</button>
                            </div>
                        </form><!-- End Profile Edit Form -->

                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->

<!-- Footer & JS -->
<?php $this->load->view('landing_page/layout/footer.php') ?>
<?php $this->load->view('landing_page/layout/script.php') ?>