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
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php') ?>/Admin/Kelola_perawatan"><?= $alamat2 ?></a></li>
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
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>:</td>
                                            <td><?= $perawatan->id ?></td>
                                        </tr>
                                        <tr>
                                            <td>Merk Mobil</td>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                foreach ($mobil as $objmobil) {
                                                    if ($perawatan->mobil_id == $objmobil->id) {
                                                        $merkmobil = $objmobil->merk_id;
                                                        $platmobil = $objmobil->nopol;
                                                        break;
                                                    }
                                                }
                                                foreach ($merk as $objmerk) {
                                                    if ($merkmobil == $objmerk->id) {
                                                        echo $objmerk->nama . ' ' . $objmerk->produk . ' (' . $platmobil . ')';
                                                        break;
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Perawatan</td>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                foreach ($jenis as $objjenis) {
                                                    if ($perawatan->jenis_perawatan_id == $objjenis->id) {
                                                        echo ucwords($objjenis->nama);
                                                        break;
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Biaya</td>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                foreach ($jenis as $objjenis) {
                                                    if ($perawatan->jenis_perawatan_id == $objjenis->id) {
                                                        echo number_format($objjenis->harga, 2, ',', '.');
                                                        break;
                                                    }
                                                }

                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kilometer Mobil</td>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                if (empty($perawatan->km_mobil)) {
                                                    $km_mobil = '-';
                                                    echo $km_mobil;
                                                } else {
                                                    echo number_format($perawatan->km_mobil, '0', ',', '.',) . ' KM';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Rawat</td>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                if (empty($perawatan->tanggal)) {
                                                    $tanggal = '-';
                                                    echo $tanggal;
                                                } else {
                                                    echo date("D, d F Y", strtotime($perawatan->tanggal));
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi Perawatan</td>
                                            <td>:</td>
                                            <td><?= $perawatan->deskripsi ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col">
                                <?php
                                $hidden = array('idupdate' => $perawatan->id);
                                echo form_open("Admin/Kelola_perawatan/save", '', $hidden);
                                ?>
                                <!-- Merk Mobil -->
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-4 pt-0">Pilih Merk Mobil</legend>
                                    <div class="col-sm-8">
                                        <?php
                                        foreach ($mobil as $range) {
                                        ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="merk" id="gridRadios<?= $range->id ?>" value="<?= $range->id ?>" <?php
                                                                                                                                                                    if ($perawatan->mobil_id == $range->id) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                    ?>>
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
                                </fieldset>

                                <!-- Jenis Perawatan -->
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-4 pt-0">Pilih Jenis Perawatan</legend>
                                    <div class="col-sm-8">
                                        <?php
                                        foreach ($jenis as $range) {
                                        ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis" id="gridRadio<?= $range->id ?>" value="<?= $range->id ?>" <?php
                                                                                                                                                                    if ($perawatan->jenis_perawatan_id == $range->id) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                    ?>>
                                                <label class="form-check-label" for="gridRadio<?= $range->id ?>">
                                                    <?= $range->nama ?>
                                                </label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </fieldset>

                                <!-- Tanggal -->
                                <div class="row mb-3">
                                    <label for="tanggal" class="col-sm-4 col-form-label">Tanggal Rawat</label>
                                    <div class="col-sm-8">
                                        <input id="tanggal" name="tanggal" type="date" class="form-control" value="<?= $perawatan->tanggal ?>">
                                    </div>
                                </div>

                                <!-- KM Mobil -->
                                <div class="row mb-3">
                                    <label for="km_mobil" class="col-sm-4 col-form-label">KM Mobil</label>
                                    <div class="col-sm-8">
                                        <input id="km_mobil" name="km_mobil" type="number" class="form-control" value="<?= $perawatan->km_mobil ?>" required>
                                    </div>
                                </div>

                                <!-- Deskripsi -->
                                <div class="row mb-3">
                                    <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                                    <div class="col-sm-8">
                                        <textarea id="deskripsi" name="deskripsi" class="form-control" style="height: 100px"><?= $perawatan->deskripsi ?></textarea>
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