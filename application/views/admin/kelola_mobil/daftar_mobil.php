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
                <li class="breadcrumb-item active"><?= $alamat2 ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Main Section -->
    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-2">
                        <div class="card-body table-responsive">
                            <h5 class="card-title">Tabel <?= $alamat2 ?></h5>
                            <!-- Table with hoverable rows -->
                            <table class="table table-hover text-nowrap text-center table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">No. Polisi</th>
                                        <th scope="col">Merk</th>
                                        <th scope="col">Warna</th>
                                        <th scope="col">Biaya Sewa</th>
                                        <th scope="col">CC</th>
                                        <th scope="col">Tahun Keluar</th>
                                        <th scope="col">View</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($mobil as $obj) {
                                        echo '<tr>';
                                        echo '<td scope="row">' . $obj->id . '</td>';
                                        echo '<td>' . $obj->nopol . '</td>';

                                        foreach ($merk as $objmerk) {
                                            if ($obj->merk_id == $objmerk->id) {
                                                echo '<td>' . $objmerk->nama . ' ' . $objmerk->produk . '</td>';
                                                break;
                                            }
                                        }
                                        echo '<td>' . ucwords($obj->warna) . '</td>';
                                        echo '<td>Rp' . number_format($obj->biaya_sewa, 2, ',', '.') . '</td>';
                                        if (empty($obj->cc)) {
                                            $cc = '-';
                                            echo '<td>' . $cc . '</td>';
                                        } else {
                                            echo '<td>' . $obj->cc . ' CC </td>';
                                        }
                                        if (empty($obj->tahun)) {
                                            $tahun = '-';
                                            echo '<td>' . $tahun . '</td>';
                                        } else {
                                            echo '<td>' . $obj->tahun . '</td>';
                                        }
                                        echo '<td> <a class="btn btn-primary btn-sm" href="' . base_url("index.php") . '/Admin/Kelola_mobil/view?id=' . $obj->id . '"><i class="bi bi-eye-fill"></i> View</a></td>';
                                        echo '<td>';
                                        echo '<a class="btn btn-warning btn-sm" href="' . base_url("index.php") . '/Admin/Kelola_mobil/update?id=' . $obj->id . '"><i class="bi bi-pencil"></i> Edit</a>';
                                    ?>
                                        <a class="btn btn-danger btn-sm" href="<?= base_url('index.php') . '/Admin/Kelola_mobil/delete?id=' . $obj->id ?>" onclick="if(!confirm('Anda Yakin Akan Menghapus Mobil Dengan No.Polisi <?= $obj->nopol ?>?')) {return false}"><i class="bi bi-trash"></i> Delete</a>
                                    <?php
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <a class="btn btn-success mt-1" href="<?php echo base_url('index.php') ?>/Admin/Kelola_mobil/form"><i class="bi bi-folder"></i> Tambah Mobil</a>
                            <!-- End Table with hoverable rows -->
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