<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <!-- Dashboard -->
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-heading">Dashboard</li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo base_url('index.php') ?>/Dashboard">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li>

    <?php
    if ($this->session->userdata('bagian') == 'administrator') {
      $nav1 = 'Kelola Mobil';
      $nav2 = 'Kelola Perawatan';
      $nav3 = 'Kelola Sewa';
    } else {
      $nav1 = 'Data Mobil';
      $nav2 = 'Data Perawatan';
      $nav3 = 'Data Sewa';
    }
    ?>

    <!-- Kelola Mobil -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#mobil-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span><?= $nav1 ?></span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="mobil-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="
                <?php
                if ($this->session->userdata('bagian') == 'administrator') {
                  echo base_url('index.php/Admin/Kelola_mobil');
                } else {
                  echo base_url('index.php/Public/Data_mobil');
                }
                ?>">
            <i class="bi bi-circle"></i><span>Daftar Mobil</span>
          </a>
        </li>
        <li>
          <a href="
                <?php
                if ($this->session->userdata('bagian') == 'administrator') {
                  echo base_url('index.php/Admin/Kelola_merk');
                } else {
                  echo base_url('index.php/Public/Data_merk');
                }
                ?>">
            <i class="bi bi-circle"></i><span>Daftar Merk</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- Kelola Perawatan -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#perawatan-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span><?= $nav2 ?></span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="perawatan-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="
                 <?php
                  if ($this->session->userdata('bagian') == 'administrator') {
                    echo base_url('index.php/Admin/Kelola_perawatan');
                  } else {
                    echo base_url('index.php/Public/Data_perawatan');
                  }
                  ?>">
            <i class="bi bi-circle"></i><span>Daftar Perawatan</span>
          </a>
        </li>
        <li>
          <a href="
                 <?php
                  if ($this->session->userdata('bagian') == 'administrator') {
                    echo base_url('index.php/Admin/Kelola_jenis');
                  } else {
                    echo base_url('index.php/Public/Data_jenis');
                  }
                  ?>">
            <i class="bi bi-circle"></i><span>Tabel Jenis</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- Kelola Sewa -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#sewa-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-clipboard-check"></i><span><?= $nav3 ?></span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="sewa-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="
                  <?php
                  if ($this->session->userdata('bagian') == 'administrator') {
                    echo base_url('index.php/Admin/Data_sewa');
                  } else {
                    echo base_url('index.php/Public/Data_sewa');
                  }
                  ?>">
            <i class="bi bi-circle"></i><span>Daftar Sewa</span>
          </a>
        </li>
      </ul>
    </li>

    <?php
    if ($this->session->userdata('bagian') == 'administrator') {
    ?>
      <!-- Kelola Users -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-lines-fill"></i><span>Kelola Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="user-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('index.php') ?>/Admin/Data_user">
              <i class="bi bi-circle"></i><span>Daftar Users</span>
            </a>
          </li>
        </ul>
      </li>

    <?php
    }
    ?>
    <li class="nav-heading">To Landing Page</li>

    <!-- F.A.Q -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo base_url('index.php') ?>">
        <i class="bi bi-laptop"></i>
        <span>Back To Landing Page</span>
      </a>
    </li>

    <li class="nav-heading">Info</li>

    <!-- F.A.Q -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo base_url('index.php') ?>/Dashboard/faq">
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q</span>
      </a>
    </li>

    <!-- Contact -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo base_url('index.php') ?>/Dashboard/contact">
        <i class="bi bi-envelope"></i>
        <span>Contact</span>
      </a>
    </li>

  </ul>

</aside>
<!-- End Sidebar-->