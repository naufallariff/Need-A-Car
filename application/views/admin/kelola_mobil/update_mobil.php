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
    </div><!-- End Page Title -->

    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card p-2">
                    <div class="card-body">
                        <h5 class="card-title"><?= $title ?></h5>
                        <div class="row table-responsive">
                            <div class="col">
                                <table class="table table-striped text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>:</td>
                                            <td><?= $data_mobil->id ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Polisi</td>
                                            <td>:</td>
                                            <td><?= $data_mobil->nopol ?></td>
                                        </tr>
                                        <tr>
                                            <td>Merk</td>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                foreach ($merk as $objmerk) {
                                                    if ($data_mobil->merk_id == $objmerk->id) {
                                                        echo $objmerk->nama . ' ' . $objmerk->produk;
                                                        break;
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Warna</td>
                                            <td>:</td>
                                            <td><?= ucwords($data_mobil->warna) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Biaya Sewa</td>
                                            <td>:</td>
                                            <td><?= number_format($data_mobil->biaya_sewa, 2, ',', '.') ?> Perhari</td>
                                        </tr>
                                        <tr>
                                            <td>CC</td>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                if (empty($data_mobil->cc)) {
                                                    $cc = '-';
                                                    echo $cc;
                                                } else {
                                                    echo $data_mobil->cc;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Keluar</td>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                if (empty($data_mobil->tahun)) {
                                                    $tahun = '-';
                                                    echo $tahun;
                                                } else {
                                                    echo $data_mobil->tahun;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                $deskripsi = explode(',', $data_mobil->deskripsi);
                                                $no = 0;
                                                foreach ($deskripsi as $desc) {
                                                    if ($deskripsi[$no] !== '') {
                                                        echo '- ' . $deskripsi[$no] . '<br>';
                                                    } else {
                                                        echo '-';
                                                    }
                                                    $no++;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col">
                                <?php
                                $hidden = array('idupdate' => $data_mobil->id);
                                echo form_open("Admin/Kelola_mobil/save", '', $hidden);
                                ?>
                                <!-- No. Polisi -->
                                <div class="row mb-3">
                                    <label for="nopol" class="col-sm-4 col-form-label">No. Polisi</label>
                                    <div class="col-sm-8">
                                        <input id="nopol" name="nopol" type="text" class="form-control" value="<?= $data_mobil->nopol ?>" required>
                                    </div>
                                </div>

                                <!-- Warna -->
                                <div class="row mb-3">
                                    <label for="warna" class="col-sm-4 col-form-label">Warna</label>
                                    <div class="col-sm-8">
                                        <input id="warna" name="warna" type="text" class="form-control" value="<?= $data_mobil->warna ?>" required>
                                    </div>
                                </div>

                                <!-- Biaya Sewa -->
                                <div class="row mb-3">
                                    <label for="biaya_sewa" class="col-sm-4 col-form-label">Biaya Sewa</label>
                                    <div class="col-sm-8">
                                        <input id="biaya_sewa" name="biaya_sewa" type="number" value="<?= $data_mobil->biaya_sewa ?>" class="form-control" required>
                                    </div>
                                </div>

                                <!-- Deskripsi -->
                                <div class="row mb-3">
                                    <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                                    <div class="col-sm-8">
                                        <textarea id="deskripsi" name="deskripsi" class="form-control" style="height: 100px"><?= $data_mobil->deskripsi ?></textarea>
                                    </div>
                                </div>

                                <!-- CC -->
                                <div class="row mb-3">
                                    <label for="cc" class="col-sm-4 col-form-label">CC</label>
                                    <div class="col-sm-8">
                                        <input id="cc" name="cc" type="number" class="form-control" value="<?= $data_mobil->cc ?>">
                                    </div>
                                </div>

                                <!-- Tahun -->
                                <div class="row mb-3">
                                    <label for="tahun" class="col-sm-4 col-form-label">Tahun</label>
                                    <div class="col-sm-8">
                                        <input id="tahun" name="tahun" type="number" class="form-control" value="<?= $data_mobil->tahun ?>">
                                    </div>
                                </div>
                                <!-- Merk Id -->
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-4 pt-0">Pilih Merk</legend>
                                    <div class="col-sm-8">
                                        <?php
                                        foreach ($merk as $range) {
                                        ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" 
                                                name="merk" id="gridRadios<?= $range->id ?>" value="<?= $range->id ?>"
                                                 <?php
                                                    if ($data_mobil->merk_id == $range->id) {
                                                        echo 'checked';
                                                    }
                                                ?>>
                                                <label class="form-check-label" for="gridRadios<?= $range->id ?>">
                                                    <?= $range->nama . ' ' . $range->produk ?>
                                                </label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </fieldset>


                                <!-- Submit -->
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <button name="submit" id="submit" type="submit" class="btn btn-primary">Kirim</button>
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