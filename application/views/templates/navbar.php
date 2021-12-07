<!-- Left navbar links -->
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><em class="fas fa-bars"></em></a>
  </li>
  <li class="nav-item d-none d-sm-inline-block">
    <a href="#" class="nav-link"><?= JUDUL ?></a>
  </li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <em class="far fa-bell"></em>
      <span class="badge badge-warning navbar-badge"></span>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">0 Notifikasi</span>

        <a href="#" class="dropdown-item dropdown-footer"> </a>
      </div>
    </a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <em class="fa fa-user-circle" style="font-size: 25px;"></em>
    </a>
    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
      <a href="<?= base_url("Login/logout"); ?>" class="dropdown-item dropdown-footer"><strong>Logout</strong></a>
    </div>
  </li>
</ul>