<?php
if ($this->session->userdata('bagian') !== 'administrator') {
    redirect("Dashboard");
}
?>
<!-- Meta -->
<?php $this->load->view('dashboard/layout/meta.php') ?>

<!-- Header -->
<?php $this->load->view('dashboard/layout/navbar.php') ?>

<!-- Sidebar -->
<?php $this->load->view('dashboard/layout/sidebar.php') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1 class="mb-3 mt-1"><?= $alamat1 ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php') ?>/Dashboard"><?= $home ?></a></li>
                <li class="breadcrumb-item"><?= $alamat1 ?></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php') ?>/Admin/Kelola_mobil"><?= $alamat2 ?></a></li>
                <li class="breadcrumb-item active"><?= $alamat3 ?></li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-2">
                        <div class="card-body">
                            <h5 class="card-title">Form <?= $alamat1 ?></h5>
                            <div class="col-12 m-auto">
                                <form action="<?php echo base_url("index.php") ?>/Admin/Kelola_mobil/save" method="post" accept-charset="utf-8">

                                    <!-- Merk Id -->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-4 pt-0">Pilih Merk</legend>
                                        <div class="col-sm-8">
                                            <?php
                                            foreach ($merk as $range) {
                                            ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="merk" id="gridRadios<?= $range->id ?>" value="<?= $range->id ?>">
                                                    <label class="form-check-label" for="gridRadios<?= $range->id ?>">
                                                        <?= $range->nama . ' ' . $range->produk ?>
                                                    </label>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </fieldset>

                                    <!-- No. Polisi -->
                                    <div class="row mb-3">
                                        <label for="nopol" class="col-sm-4 col-form-label">No. Polisi</label>
                                        <div class="col-sm-8">
                                            <input id="nopol" name="nopol" type="text" class="form-control" required>
                                        </div>
                                    </div>

                                    <!-- Warna -->
                                    <div class="row mb-3">
                                        <label for="warna" class="col-sm-4 col-form-label">Warna</label>
                                        <div class="col-sm-8">
                                            <input id="warna" name="warna" type="text" class="form-control" required>
                                        </div>
                                    </div>

                                    <!-- Biaya Sewa -->
                                    <div class="row mb-3">
                                        <label for="biaya_sewa" class="col-sm-4 col-form-label">Biaya Sewa</label>
                                        <div class="col-sm-8">
                                            <input id="biaya_sewa" name="biaya_sewa" type="number" class="form-control" required>
                                        </div>
                                    </div>

                                    <!-- CC -->
                                    <div class="row mb-3">
                                        <label for="cc" class="col-sm-4 col-form-label">CC</label>
                                        <div class="col-sm-8">
                                            <input id="cc" name="cc" type="number" class="form-control">
                                        </div>
                                    </div>

                                    <!-- Tahun -->
                                    <div class="row mb-3">
                                        <label for="tahun" class="col-sm-4 col-form-label">Tahun</label>
                                        <div class="col-sm-8">
                                            <input id="tahun" name="tahun" type="number" class="form-control" min="1900" max="2022">
                                        </div>
                                    </div>

                                    <!-- Deskripsi -->
                                    <div class="row mb-3">
                                        <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                                        <div class="col-sm-8">
                                            <textarea id="deskripsi" name="deskripsi" class="form-control" style="height: 100px"></textarea>
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label"></label>
                                        <div class="col-sm-8">
                                            <button name="submit" id="submit" onclick="if(!confirm('Anda Yakin Data yang anda masukkan sudah benar?')) {return false}" type="submit" class="btn btn-primary">Kirim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- Footer & JS -->
<?php $this->load->view('dashboard/layout/footer.php') ?>
<?php $this->load->view('dashboard/layout/script.php') ?>