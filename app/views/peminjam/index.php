<!-- Page Heading & Stats Row -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-8">
    <div>
        <h1 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">Daftar Alat</h1>
        <p class="text-slate-500 dark:text-slate-400 mt-1">Cari dan ajukan peminjaman alat yang tersedia.</p>
    </div>
    <div class="flex flex-wrap gap-3">
        <button onclick="openModal()"
            class="flex items-center gap-2 rounded-xl bg-primary px-5 py-2.5 text-sm font-bold text-white soft-shadow hover:bg-blue-700 transition-all">
            <span class="material-symbols-outlined text-xl">add_circle</span>
            Ajukan Peminjaman
        </button>
        <a href="<?= BASE_URL; ?>/peminjam/riwayat"
            class="flex items-center gap-2 rounded-xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-4 py-2.5 text-sm font-bold soft-shadow hover:bg-slate-50 dark:hover:bg-slate-750 transition-all">
            <span class="material-symbols-outlined text-xl">history</span>
            Riwayat Peminjaman
        </a>
    </div>
</div>

<!-- Stats Overview Cards -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow">
        <div class="flex items-center justify-between mb-4">
            <div
                class="size-10 bg-blue-100 dark:bg-blue-900/30 text-primary rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined">shopping_bag</span>
            </div>
        </div>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Peminjaman</p>
        <h3 class="text-2xl font-black text-slate-900 dark:text-white mt-1"><?= $data['total_pinjam']; ?></h3>
    </div>
    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow">
        <div class="flex items-center justify-between mb-4">
            <div
                class="size-10 bg-amber-100 dark:bg-amber-900/30 text-amber-600 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined">pending</span>
            </div>
        </div>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Sedang Dipinjam</p>
        <h3 class="text-2xl font-black text-slate-900 dark:text-white mt-1"><?= $data['pinjam_aktif']; ?></h3>
    </div>
    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow">
        <div class="flex items-center justify-between mb-4">
            <div
                class="size-10 bg-rose-100 dark:bg-rose-900/30 text-rose-600 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined">money_off</span>
            </div>
        </div>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Denda</p>
        <h3 class="text-2xl font-black text-slate-900 dark:text-white mt-1">Rp
            <?= number_format($data['denda_total'], 0, ',', '.'); ?></h3>
    </div>
</div>

<!-- Tools Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    <?php foreach ($data['alat'] as $alat): ?>
        <div
            class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow overflow-hidden group hover:border-primary/50 transition-colors">
            <div class="relative h-48 bg-slate-100 dark:bg-slate-700 overflow-hidden">
                <?php if ($alat['gambar']): ?>
                    <img src="<?= BASE_URL; ?>/uploads/<?= $alat['gambar']; ?>"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                        alt="<?= $alat['nama_alat']; ?>">
                <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center text-slate-400">
                        <span class="material-symbols-outlined text-4xl">image_not_supported</span>
                    </div>
                <?php endif; ?>
                <div class="absolute top-3 right-3">
                    <?php if ($alat['stok'] > 0): ?>
                        <span class="bg-emerald-500 text-white text-[10px] font-bold px-2 py-1 rounded-full">Tersedia</span>
                    <?php else: ?>
                        <span class="bg-rose-500 text-white text-[10px] font-bold px-2 py-1 rounded-full">Habis</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="p-5">
                <h3 class="font-bold text-slate-900 dark:text-white mb-1"><?= $alat['nama_alat']; ?></h3>
                <p class="text-xs text-slate-500 mb-3"><?= $alat['nama_kategori']; ?></p>
                <p class="text-sm text-slate-600 dark:text-slate-300 line-clamp-2 mb-4"><?= $alat['deskripsi']; ?></p>

                <div class="flex items-center justify-between mt-auto">
                    <span class="text-xs font-semibold text-slate-500">Stok: <?= $alat['stok']; ?></span>
                    <?php if ($alat['stok'] > 0): ?>
                        <button onclick="openModal('<?= $alat['id']; ?>')"
                            class="bg-primary text-white text-sm font-bold px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                            Pinjam
                        </button>
                    <?php else: ?>
                        <button class="bg-slate-200 text-slate-400 text-sm font-bold px-4 py-2 rounded-lg cursor-not-allowed">
                            Habis
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Modal Pinjam (Tailwind) -->
<div id="pinjamModal"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="bg-white dark:bg-slate-850 w-full max-w-lg rounded-2xl soft-shadow overflow-hidden transform scale-95 transition-transform duration-300 model-content"
        id="modalContent">
        <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between">
            <h3 class="text-xl font-bold">Ajukan Peminjaman</h3>
            <button onclick="closeModal()"
                class="p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form action="<?= BASE_URL; ?>/peminjam/ajukan" method="post" class="p-6 space-y-4">

            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Pilih Alat</label>
                <select name="alat_id" id="alat_id_select"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    <?php foreach ($data['alat'] as $option): ?>
                        <option value="<?= $option['id']; ?>" <?= $option['stok'] <= 0 ? 'disabled' : ''; ?>>
                            <?= $option['nama_alat']; ?> (Stok: <?= $option['stok']; ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Tanggal Pinjam</label>
                    <input type="date" name="tgl_pinjam" id="tgl_pinjam"
                        class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                        required>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" id="tgl_kembali"
                        class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                        required>
                </div>
            </div>

            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-200 dark:border-slate-700">
                <button type="button" onclick="closeModal()"
                    class="px-6 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 font-bold hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">Batal</button>
                <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-primary text-white font-bold soft-shadow hover:bg-blue-700 transition-all">Ajukan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(selectedId = null) {
        // Create select element manipulation logic
        const select = document.getElementById('alat_id_select');

        if (selectedId) {
            select.value = selectedId;
        } else {
            // Optional: reset to first or specific default
            // select.selectedIndex = 0;
        }

        const modal = document.getElementById('pinjamModal');
        const content = document.getElementById('modalContent');

        modal.classList.remove('opacity-0', 'pointer-events-none');
        content.classList.remove('scale-95');
        content.classList.add('scale-100');

        const today = new Date().toISOString().split('T')[0];
        document.getElementById('tgl_pinjam').value = today;
        document.getElementById('tgl_pinjam').min = today;
        document.getElementById('tgl_kembali').min = today;
    }

    function closeModal() {
        const modal = document.getElementById('pinjamModal');
        const content = document.getElementById('modalContent');

        modal.classList.add('opacity-0', 'pointer-events-none');
        content.classList.remove('scale-100');
        content.classList.add('scale-95');
    }
</script>