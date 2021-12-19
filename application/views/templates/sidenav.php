<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <span class="avatar-title bg-danger rounded-circle border border-white text-light" style="font-weight: bold;">K
                    </span>
                </div>
                <div class="info">
                    <a>
                        <span>
                            Admin
                            <span class="user-level">Administrator</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item <?= activeMenu("dashboard", isset($active) ? $active : ''); ?>">
                    <a href="<?= base_url('/dashboard') ?>">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Pengaduan</h4>
                </li>
                <li class="nav-item <?= activeMenu("pengaduan", isset($active) ? $active : ''); ?>">
                    <a href="<?= base_url('/pengaduan') ?>">
                        <i class="la flaticon-chat-4"></i>
                        <p>Form Pengaduan</p>
                    </a>
                </li>
                <li class="nav-item <?= activeMenu("pengaduan-show", isset($active) ? $active : ''); ?>">
                    <a href="<?= base_url('/pengaduan/show') ?>">
                        <i class="la flaticon-file-1"></i>
                        <p>Data Pengaduan</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Laporan</h4>
                </li>
                <li class="nav-item <?= activeMenu("laporan", isset($active) ? $active : ''); ?>">
                    <a href="<?= base_url('/laporan') ?>">
                        <i class="fas fa-file-signature"></i>
                        <p>Buat Laporan</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>