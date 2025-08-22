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

    <section class="section faq">
        <div class="row">
            <div class="col-lg-12">

                <!-- F.A.Q Group 1 -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pertanyaan yang sering diajukan</h5>

                        <div class="accordion accordion-flush" id="faq-group-1">

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-1" type="button" data-bs-toggle="collapse">
                                        Bagaimana cara menyewa disini ?
                                    </button>
                                </h2>
                                <div id="faqsOne-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                                    <div class="accordion-body">
                                        Anda bisa menghubungi kami langsung di kontak yang tersedia
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-2" type="button" data-bs-toggle="collapse">
                                        Apa kendaraan yang disewa dalam kondisi baik ?
                                    </button>
                                </h2>
                                <div id="faqsOne-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                                    <div class="accordion-body">
                                        Kami selalu menjadi kondisi kendaraan dengan baik untuk kenyamanan Pelanggan demi menjaga kepuasan dan kenyamanan.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-3" type="button" data-bs-toggle="collapse">
                                        Bagaimana jika kami ada keluhan ?
                                    </button>
                                </h2>
                                <div id="faqsOne-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                                    <div class="accordion-body">
                                        Kami menghargai dan mencermati segala keluhan dari para pelanggan kemudian mengambil langkah untuk perbaikan
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div><!-- End F.A.Q Group 1 -->

            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- Footer & JS -->
<?php $this->load->view('dashboard/layout/footer.php') ?>
<?php $this->load->view('dashboard/layout/script.php') ?>