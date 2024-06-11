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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-2">
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-title"><?= $cardTitle ?></h5>
                                <?= $this->session->flashdata('message') ?>
                                <div class="col-12 col-lg-8 col-sm-12 table-responsive">
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

                                <div class="col col-lg-4 col-sm-12">
                                    <h5 class="card-title p-0">Foto Mobil</h5>
                                    <?php
                                    $filegambar = base_url('img/mobil/' . $data_mobil->foto);
                    
                                    ?>
                                    <img src="
                                    <?php
                                    $array = get_headers($filegambar);
                                    $string = $array[0];
                
                                    if (strpos($string, '200')) {
                                        echo $filegambar;
                                    } else {
                                        echo base_url('img/mobil/nopict.jpg');
                                    }
                                
                                    ?>" class="img-thumbnail mb-2" alt="mobil<?= $data_mobil->id ?>">
                                    <?= form_open_multipart('Admin/Kelola_mobil/upload') ?>
                                    <div class="row">
                                        <input type="hidden" name="nopol" value="<?= $data_mobil->nopol ?>">
                                        <input type="hidden" name="id" value="<?= $data_mobil->id ?>">
                                        <input class="form-control form-control-sm" name="mobil_image" id="formFileSm" type="file">
                                        <button type="submit" class="btn btn-primary btn-sm mt-2">Confirm</button>
                                    </div>

                                    <?= form_close() ?>
                                </div>
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