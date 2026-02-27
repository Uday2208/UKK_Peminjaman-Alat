<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Manajemen Kategori</h1>
    <button onclick="openModal('tambahKategoriModal')"
        class="flex items-center gap-2 rounded-xl bg-primary px-5 py-2.5 text-sm font-bold text-white soft-shadow hover:bg-blue-700 transition-all">
        <span class="material-symbols-outlined text-lg">add</span>
        Tambah Kategori
    </button>
</div>

<!-- Table -->
<div
    class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 soft-shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 dark:bg-slate-850/50">
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        No</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        Nama Kategori</th>
                    <th
                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700 text-right">
                        Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                <?php $no = 1;
                foreach ($data['kategori'] as $kategori): ?>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-750 transition-colors">
                        <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400"><?= $no++; ?></td>
                        <td class="px-6 py-4 font-bold text-slate-900 dark:text-white"><?= $kategori['nama_kategori']; ?>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button onclick="openEditModal(<?= $kategori['id']; ?>)"
                                    class="p-2 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/30 text-blue-600 transition-colors"
                                    title="Edit">
                                    <span class="material-symbols-outlined text-xl">edit</span>
                                </button>
                                <a href="<?= BASE_URL; ?>/admin/kategoriDelete/<?= $kategori['id']; ?>"
                                    onclick="return confirm('Yakin ingin menghapus?')"
                                    class="p-2 rounded-lg hover:bg-rose-50 dark:hover:bg-rose-900/30 text-rose-600 transition-colors"
                                    title="Delete">
                                    <span class="material-symbols-outlined text-xl">delete</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div id="tambahKategoriModal"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300">
    <div
        class="bg-white dark:bg-slate-850 w-full max-w-lg rounded-2xl soft-shadow overflow-hidden transform scale-95 transition-transform duration-300 model-content">
        <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between">
            <h3 class="text-xl font-bold">Tambah Kategori</h3>
            <button onclick="closeModal('tambahKategoriModal')"
                class="p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form action="<?= BASE_URL; ?>/admin/kategoriStore" method="post" class="p-6 space-y-4">
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Nama Kategori</label>
                <input type="text" name="nama_kategori"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    required>
            </div>
            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-200 dark:border-slate-700">
                <button type="button" onclick="closeModal('tambahKategoriModal')"
                    class="px-6 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 font-bold hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">Batal</button>
                <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-primary text-white font-bold soft-shadow hover:bg-blue-700 transition-all">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editKategoriModal"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300">
    <div
        class="bg-white dark:bg-slate-850 w-full max-w-lg rounded-2xl soft-shadow overflow-hidden transform scale-95 transition-transform duration-300 model-content">
        <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between">
            <h3 class="text-xl font-bold">Ubah Kategori</h3>
            <button onclick="closeModal('editKategoriModal')"
                class="p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form action="<?= BASE_URL; ?>/admin/kategoriUpdate" method="post" class="p-6 space-y-4">
            <input type="hidden" name="id" id="id_kategori_edit">
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Nama Kategori</label>
                <input type="text" name="nama_kategori" id="nama_kategori_edit"
                    class="w-full px-4 py-2.5 rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    required>
            </div>
            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-200 dark:border-slate-700">
                <button type="button" onclick="closeModal('editKategoriModal')"
                    class="px-6 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 font-bold hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">Batal</button>
                <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-primary text-white font-bold soft-shadow hover:bg-blue-700 transition-all">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.remove('opacity-0', 'pointer-events-none');
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add('opacity-0', 'pointer-events-none');
    }

    function openEditModal(id) {
        fetch('<?= BASE_URL; ?>/admin/getKategoriById/' + id)
            .then(res => res.json())
            .then(data => {
                document.getElementById('id_kategori_edit').value = data.id;
                document.getElementById('nama_kategori_edit').value = data.nama_kategori;
                openModal('editKategoriModal');
            });
    }
</script>