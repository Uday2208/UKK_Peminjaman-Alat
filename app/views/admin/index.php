<!-- Page Heading & Stats Row -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-8">
    <div>
        <h1 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">Dashboard Admin</h1>
        <p class="text-slate-500 dark:text-slate-400 mt-1">Pantau, lacak, dan kelola semua aset organisasi.</p>
    </div>
    <div class="flex flex-wrap gap-3">
        <a href="<?= BASE_URL; ?>/admin/cetakLaporan" target="_blank"
            class="flex items-center gap-2 rounded-xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-4 py-2.5 text-sm font-bold soft-shadow hover:bg-slate-50 dark:hover:bg-slate-750 transition-all">
            <span class="material-symbols-outlined text-xl">print</span>
            Cetak Laporan
        </a>
        <a href="<?= BASE_URL; ?>/admin/alat"
            class="flex items-center gap-2 rounded-xl bg-primary px-5 py-2.5 text-sm font-bold text-white soft-shadow hover:bg-blue-700 transition-all">
            <span class="material-symbols-outlined text-xl">add</span>
            Kelola Alat
        </a>
    </div>
</div>
<!-- Stats Overview Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow">
        <div class="flex items-center justify-between mb-4">
            <div
                class="size-10 bg-blue-100 dark:bg-blue-900/30 text-primary rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined">group</span>
            </div>
            <!-- <span class="text-xs font-bold text-emerald-600 bg-emerald-100 dark:bg-emerald-900/30 px-2 py-1 rounded-md">+12%</span> -->
        </div>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total User</p>
        <h3 class="text-2xl font-black text-slate-900 dark:text-white mt-1"><?= $data['users_count']; ?>
        </h3>
    </div>
    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow">
        <div class="flex items-center justify-between mb-4">
            <div
                class="size-10 bg-amber-100 dark:bg-amber-900/30 text-amber-600 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined">inventory</span>
            </div>
            <span
                class="text-xs font-bold text-slate-500 bg-slate-100 dark:bg-slate-700 px-2 py-1 rounded-md">Stok</span>
        </div>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Alat</p>
        <h3 class="text-2xl font-black text-slate-900 dark:text-white mt-1"><?= $data['alat_count']; ?></h3>
    </div>
    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow">
        <div class="flex items-center justify-between mb-4">
            <div
                class="size-10 bg-rose-100 dark:bg-rose-900/30 text-rose-600 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined">pending_actions</span>
            </div>
        </div>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Peminjaman Aktif</p>
        <h3 class="text-2xl font-black text-slate-900 dark:text-white mt-1">
            <?= $data['peminjaman_count']; ?>
        </h3>
    </div>
</div>

<!-- Quick Links / Info Section -->
<div
    class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow overflow-hidden p-6">
    <h3 class="text-lg font-bold mb-4">Akses Cepat</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="<?= BASE_URL; ?>/admin/users"
            class="flex flex-col items-center justify-center p-4 border rounded-xl hover:bg-slate-50 transition-colors">
            <span class="material-symbols-outlined text-3xl text-primary mb-2">person_add</span>
            <span class="text-sm font-semibold">User Baru</span>
        </a>
        <a href="<?= BASE_URL; ?>/admin/alat"
            class="flex flex-col items-center justify-center p-4 border rounded-xl hover:bg-slate-50 transition-colors">
            <span class="material-symbols-outlined text-3xl text-emerald-600 mb-2">add_box</span>
            <span class="text-sm font-semibold">Alat Baru</span>
        </a>
        <a href="<?= BASE_URL; ?>/admin/peminjaman"
            class="flex flex-col items-center justify-center p-4 border rounded-xl hover:bg-slate-50 transition-colors">
            <span class="material-symbols-outlined text-3xl text-amber-600 mb-2">summarize</span>
            <span class="text-sm font-semibold">Laporan</span>
        </a>
        <a href="<?= BASE_URL; ?>/admin/kategori"
            class="flex flex-col items-center justify-center p-4 border rounded-xl hover:bg-slate-50 transition-colors">
            <span class="material-symbols-outlined text-3xl text-purple-600 mb-2">category</span>
            <span class="text-sm font-semibold">Kategori</span>
        </a>
    </div>
</div>