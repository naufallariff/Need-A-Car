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
                                        <th scope="col">Nama Jenis</th>
                                        <th scope="col">Biaya Perawatan</th>
                                        <th scope="col">Update</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($jenis as $obj) {
                                        echo '<tr>';
                                        echo '<td>' . $obj->id . '</td>';
                                        echo '<td>';
                                        if (!empty($obj->nama)) {
                                            echo ucwords($obj->nama);
                                        } else {
                                            echo '-';
                                        }
                                        echo '</td>';
                                        echo '<td>';
                                        if (!empty($obj->harga)) {
                                            echo 'Rp' . number_format($obj->harga, 2, ',', '.');
                                        } else {
                                            echo '-';
                                        }
                                        echo '</td>';
                                        echo '<td>';
                                        echo '<a class="btn btn-warning btn-sm" href="' . base_url("index.php") . '/Admin/Kelola_jenis/update?id=' . $obj->id . '"><i class="bi bi-pencil"></i> Edit</a>';
                                        echo '</td>';
                                        echo '<td>';

                                    ?>
                                        <a class="btn btn-danger btn-sm" href="<?= base_url('index.php') . '/Admin/Kelola_jenis/delete?id=' . $obj->id ?>" onclick="if(!confirm('Anda Yakin Akan Menghapus data ini?')) {return false}"><i class="bi bi-trash"></i> Delete</a>
                                    <?php
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <a class="btn btn-success mt-1" href="<?php echo base_url('index.php') ?>/Admin/Kelola_jenis/form"><i class="bi bi-folder"></i> Tambah Jenis</a>
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