<!-- Brand Logo -->
<a href="<?= base_url("dashboard"); ?>" class="brand-link text-center navbar-dark">
  <img src="<?= base_url(); ?>assets/images/logo-white.png" alt="Girl with books" width="150" class="img-fluid">
</a>

<!-- Sidebar -->
<div id="slide-out" class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="<?= base_url("assets/"); ?>dist/img/default-avatar.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <?php $username = $this->session->userdata('username'); ?>
      <?php $level = $this->session->userdata('id_level'); ?>
      <a href="#" class="d-block"><?= $username; ?></a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Beranda</li>
          <li class="nav-item has-treeview <?= $active == "dashboard" ? " menu-open" : ""; ?>">
            <a href="<?= base_url("dashboard"); ?>" class="nav-link <?= $active == "dashboard" ? "active" : ""; ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Layanan</li>
          <li class="nav-item">
            <a href="<?= base_url("layanan/"); ?>" class="nav-link <?= $active == "data-layanan" ? "active" : ""; ?>">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                Data Layanan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url("layanan/pengajuan"); ?>" class="nav-link <?= $active == "data-layanan-pengajuan" ? "active" : ""; ?>">
              <i class="nav-icon fa fa-paste"></i>
              <p>
                Pengajuan <span class="badge badge-light" style="padding: 5px;"><?= countPengajuanBaru() ?></span>
              </p>
            </a>
          </li>
          <li class="nav-header">Bantuan Pemerintah</li>
          <li class="nav-item">
            <a href="<?= base_url("bantuan/"); ?>" class="nav-link <?= $active == "data-bantuan" ? "active" : ""; ?>">
              <i class="nav-icon fa fa-archive"></i>
              <p>
                Data Bantuan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url("bantuan/penerima"); ?>" class="nav-link <?= $active == "data-bantuan-penerima" ? "active" : ""; ?>">
              <i class="nav-icon fa fa-sign-language"></i>
              <p>
                Penerima Bantuan
              </p>
            </a>
          </li>
          <li class="nav-header">Kependudukan</li>
          <li class="nav-item has-treeview <?= $active == "data-keluarga" ? " menu-open" : ""; ?>">
            <a href="<?= base_url("keluarga/"); ?>" class="nav-link <?= $active == "data-keluarga" ? "active" : ""; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data KK
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?= $active == "data-penduduk" ? " menu-open" : ""; ?>">
            <a href="<?= base_url("penduduk/"); ?>" class="nav-link <?= $active == "data-penduduk" ? "active" : ""; ?>">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Data Penduduk
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?= $active == "data-akun" ? " menu-open" : ""; ?>">
            <a href="<?= base_url("penduduk/akun"); ?>" class="nav-link <?= $active == "data-akun" ? "active" : ""; ?>">
              <i class="nav-icon fas fa-mobile"></i>
              <p>
                Pengguna Aplikasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </ul>
  </nav>
</div>