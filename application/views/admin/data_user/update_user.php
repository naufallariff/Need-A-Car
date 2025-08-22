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
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php') ?>/Admin/Data_user"><?= $alamat2 ?></a></li>
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
                                <form action="<?php echo base_url("index.php") ?>/Admin/Data_user/ubah" method="post" accept-charset="utf-8">
                                    <input type="hidden" name="id" value="<?= $data_user['id'] ?>">
                                    <!-- status-->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-4 pt-0">Ubah Status</legend>
                                        <div class="col-sm-8">

                                            <?php
                                            if ($data_user['status'] = "1") {
                                                $checka =  'checked';
                                                $checkb =  '';
                                            } else {
                                                $checka = '';
                                                $checkb = 'checked';
                                            }
                                            if ($data_user['role'] == 'administrator') {
                                                $looka = 'checked';
                                                $lookb = '';
                                            } else {
                                                $looka = '';
                                                $lookb = 'checked';
                                            }
                                            ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="1" <?php echo $checka ?>>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="0" <?php echo $checkb ?>>
                                                <label class="form-check-label" for="gridRadios2">
                                                    Non-Active
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- status-->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-4 pt-0">Ubah Role</legend>
                                        <div class="col-sm-8">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="roledas" id="gridRadios1" value="administrator" <?= $looka ?>>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Administrator
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="roledas" id="gridRadios1" value="public" <?= $lookb ?>>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Public
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>

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