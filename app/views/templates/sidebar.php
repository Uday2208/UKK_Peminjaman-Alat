<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white border-end" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light fw-bold text-primary">APA System</div>
        <div class="list-group list-group-flush">
            <?php if ($_SESSION['role_id'] == 1):  // Admin ?>
                <a href="<?= BASE_URL; ?>/admin"
                    class="list-group-item list-group-item-action list-group-item-light p-3">Dashboard</a>
                <a href="<?= BASE_URL; ?>/admin/users"
                    class="list-group-item list-group-item-action list-group-item-light p-3">Manajemen User</a>
                <a href="<?= BASE_URL; ?>/admin/alat"
                    class="list-group-item list-group-item-action list-group-item-light p-3">Manajemen Alat</a>
                <a href="<?= BASE_URL; ?>/admin/kategori"
                    class="list-group-item list-group-item-action list-group-item-light p-3">Kategori</a>
                <a href="<?= BASE_URL; ?>/admin/peminjaman"
                    class="list-group-item list-group-item-action list-group-item-light p-3">Laporan Peminjaman</a>
            <?php elseif ($_SESSION['role_id'] == 2):  // Petugas ?>
                <a href="<?= BASE_URL; ?>/petugas"
                    class="list-group-item list-group-item-action list-group-item-light p-3">Dashboard</a>
                <a href="<?= BASE_URL; ?>/petugas/peminjaman"
                    class="list-group-item list-group-item-action list-group-item-light p-3">Daftar Peminjaman</a>
                <a href="<?= BASE_URL; ?>/petugas/pengembalian"
                    class="list-group-item list-group-item-action list-group-item-light p-3">Pengembalian</a>
            <?php elseif ($_SESSION['role_id'] == 3):  // Peminjam ?>
                <a href="<?= BASE_URL; ?>/peminjam"
                    class="list-group-item list-group-item-action list-group-item-light p-3">Dashboard</a>
                <a href="<?= BASE_URL; ?>/peminjam/alat"
                    class="list-group-item list-group-item-action list-group-item-light p-3">Daftar Alat</a>
                <a href="<?= BASE_URL; ?>/peminjam/riwayat"
                    class="list-group-item list-group-item-action list-group-item-light p-3">Riwayat Peminjaman</a>
            <?php endif; ?>

            <a href="<?= BASE_URL; ?>/auth/logout"
                class="list-group-item list-group-item-action list-group-item-light p-3 text-danger">Logout</a>
        </div>
    </div>
    <!-- Page Content wrapper -->
    <div id="page-content-wrapper">
        <!-- Top navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <button class="btn btn-primary" id="sidebarToggle">Menu</button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <span class="nav-link">Halo, <strong>
                                    <?= $_SESSION['nama']; ?>
                                </strong></span>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Main Content -->
        <div class="container-fluid p-4">