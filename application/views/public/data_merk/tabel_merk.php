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
                                            <th scope="col">Nama Merk</th>
                                            <th scope="col">Type / Model</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($merk as $obj) {
                                                echo '<tr>';
                                                echo '<td>'. $obj->id .'</td>';
                                                echo '<td>'. ucwords($obj->nama) .'</td>';
                                                echo '<td>'. ucwords($obj->produk) .'</td>';
                                            }
                                        ?>
                                    </tbody>
                                </table>
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
