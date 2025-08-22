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
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php')?>/dashboard"><?= $home ?></a></li>
                <li class="breadcrumb-item"><?= $alamat1 ?></li>
                <li class="breadcrumb-item"><a
                        href="<?php echo base_url('index.php')?>/Public/Data_perawatan"><?= $alamat2 ?></a></li>
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
                            <h5 class="card-title"><?= $cardTitle ?></h5>
                            <div class="row table-responsive">
                                <div class="col">
                                    <table class="table table-striped text-nowrap">
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
                                                    foreach($mobil as $objmobil) {
                                                            if($perawatan->mobil_id == $objmobil->id) {
                                                                $merkmobil = $objmobil->merk_id;
                                                                $platmobil = $objmobil->nopol;
                                                                break;
                                                            }
                                                        }
                                                        foreach($merk as $objmerk) {
                                                            if($merkmobil == $objmerk->id) {
                                                                echo $objmerk->nama.' '.$objmerk->produk. ' ('. $platmobil .')';
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
                                                        foreach($jenis as $objjenis) {
                                                            if($perawatan->jenis_perawatan_id == $objjenis->id) {
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
                                                        foreach($jenis as $objjenis) {
                                                            if($perawatan->jenis_perawatan_id == $objjenis->id) {
                                                                echo number_format($objjenis->harga,2,',','.');
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
                                                        if(empty($perawatan->km_mobil)) {
                                                            $km_mobil = '-';
                                                            echo $km_mobil;
                                                        } else {
                                                            echo number_format($perawatan->km_mobil,'0',',','.',). ' KM';
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Rawat</td>
                                                <td>:</td>
                                                <td>
                                                    <?php
                                                        if(empty($perawatan->tanggal)) {
                                                            $tanggal = '-';
                                                            echo $tanggal;
                                                        } else {
                                                            echo date("D, d F Y", strtotime($perawatan->tanggal));
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col">
                                    <table class="table">
                                        <tr>
                                            <th>Deskripsi Perawatan</th>
                                        </tr>                 
                                        <tr>
                                            <td><?= $perawatan->deskripsi ?></td>
                                        </tr> 
                                    </table>
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