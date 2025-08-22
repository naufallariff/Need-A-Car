<!-- Meta -->
<?php $this->load->view('dashboard/layout/meta.php') ?>

<!-- Header -->
<?php $this->load->view('dashboard/layout/navbar.php') ?>

<!-- Sidebar -->
<?php $this->load->view('dashboard/layout/sidebar.php') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1 class="mb-3 mt-1"><?= $alamat ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php') ?>/Dashboard"><?= $home ?></a>
                </li>
                <li class="breadcrumb-item active"><?= $alamat ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="
                                <?php
                                if ($this->session->has_userdata('foto')) {
                                    $array = get_headers(base_url('img/profil/'. $this->session->userdata('foto')));
                                    $string = $array[0];
                                    if (strpos($string, '200')) {
                                        echo base_url('img/profil/') . $this->session->userdata('foto');
                                    }else {
                                        echo base_url('img/profil/default.jpeg');
                                    }
                                } else {
                                    echo base_url('img/profil/default.jpeg');
                                }
                                ?>" alt="Profile" class="rounded-circle">
                            <h2>
                                <?php
                                if ($this->session->has_userdata('username')) {
                                    echo $this->session->userdata('username');
                                } else {
                                    echo 'Akun tidak dikenal';
                                }
                                ?>
                            </h2>
                            <h3>
                                <?php
                                if ($this->session->has_userdata('bagian')) {
                                    echo ucwords($this->session->userdata('bagian'));
                                } else {
                                    echo 'Role belum diisi';
                                }
                                ?>
                            </h3>
                            <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

            </div>

            <div class="col-xl-8">

                <div class="card mb-5">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#image-edit">Change Image</button>
                            </li>

                        

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview mt-2" id="profile-overview">

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Username</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?php
                                        if ($this->session->has_userdata('username')) {
                                            echo $this->session->userdata('username');
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Role</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?php
                                        if ($this->session->has_userdata('bagian')) {
                                            echo ucwords($this->session->userdata('bagian'));
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?php
                                        if ($this->session->has_userdata('email')) {
                                            echo $this->session->userdata('email');
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Status</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?php
                                        if ($this->session->has_userdata('status')) {
                                            if ($this->session->userdata('status') == 1) {
                                                echo "Activated";
                                            } else {
                                                echo "Nonactive";
                                            }
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Last Login</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?php
                                        if ($this->session->has_userdata('last_login')) {
                                            echo $this->session->userdata('last_login');
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Fom Update -->
                                <form method='post' action="<?= base_url('index.php') ?>/User/update">
                                    <input type="hidden" name="id" value="<?= $this->session->userdata['id'] ?>">
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="fullName" type="text" class="form-control" id="fullName" value="<?= $this->session->userdata('username') ?>">
                                        </div>
                                    </div>

                                    <fieldset class="row mb-3">
                                        <label class="col-md-4 col-lg-3 col-form-label">Pilih Role</label>
                                        <div class="col-md-8 col-lg-9">
                                            <?php
                                            if ($this->session->userdata['bagian'] == 'administrator') {
                                                $adminCheck = 'checked';
                                                $roleCheck = '';
                                                $disable = '';
                                            } else {
                                                $roleCheck = 'checked ';
                                                $adminCheck = '';
                                                $disable = 'disabled';
                                            }
                                            ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="public" <?= $roleCheck ?>>
                                                <label class="form-check-label" for="gridRadios1">
                                                    public
                                                </label>
                                            </div>
                                            <div class="form-check <?= $disable ?>">
                                                <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="administrator" <?= $adminCheck ?> <?= $disable ?>>
                                                <label class="form-check-label" for="gridRadios2">
                                                    Admin
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" value="<?= $this->session->userdata('email') ?>">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>


                            <div class="tab-pane fade pt-3" id="image-edit">
                                <?= $this->session->flashdata('message') ?>

                                <!-- Profile Edit Form -->
                                <?= form_open_multipart('User/upload') ?>
                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                        Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="pt-2">
                                            <input type="hidden" name="id" value="<?= $this->session->userdata['id'] ?>">
                                            <input class="form-control" name="userimage" type="file" size="20" id="userimage">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                                <?= form_error() ?>

                            </div>


                   

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- Footer & JS -->
<?php $this->load->view('dashboard/layout/footer.php') ?>
<?php $this->load->view('dashboard/layout/script.php') ?>