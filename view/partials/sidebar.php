<div class="col-md-3 col-lg-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <?php if ($_SESSION['role'] == 'admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="admin/dashboard.php">
                        Dashboard Admin
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/manage_users.php">
                        Kelola Pengguna
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/manage_donations.php">
                        Kelola Donasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/manage_reports.php">
                        Laporan Donasi
                    </a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="user/dashboard.php">
                        Dashboard Donatur
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user/view_donations.php">
                        Lihat Donasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user/history.php">
                        Riwayat Donasi
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
