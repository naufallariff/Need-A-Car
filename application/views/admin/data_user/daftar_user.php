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
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <!-- <th scope="col">Created At</th>
                                        <th scope="col">Last Login</th> -->
                                        <th scope="col">Status</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($users as $obj) {
                                        echo '<tr>';
                                        echo '<td scope="row">' . $obj->id . '</td>';
                                        echo '<td>' . $obj->username . '</td>';
                                        echo '<td>' . $obj->email . '</td>';
                                        // echo '<td>' . $obj->created_at . '</td>';
                                        // echo '<td>' . $obj->last_login . '</td>';
                                        echo '<td>' . $obj->status . '</td>';
                                        echo '<td>' . $obj->role . '</td>';
                                    ?>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="<?= base_url('index.php') . '/Admin/Data_user/update?id=' . $obj->id ?>"><i class="bi bi-pencil"></i> Edit</a>
                                            <a class="btn btn-danger btn-sm" href="<?= base_url('index.php') . '/Admin/Data_user/delete?id=' . $obj->id ?>" onclick="if(!confirm('Anda yakin akan menghapus data user <?= ucwords($obj->username) ?>?')) {return false}"><i class="bi bi-trash"></i> Delete</a>
                                        </td>
                                    <?php
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